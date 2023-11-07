<?php

namespace App\Http\Livewire;

use App\Models\DistribucionVacante;
use Livewire\WithFileUploads;
use App\Models\Genero;
use App\Models\Modalidad;
use App\Models\Postulante;
use App\Models\Sede;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\TipoDireccion;
use App\Http\Requests\View\StoreApplicantRequest;
use App\Http\Requests\View\FirstStepApplicantRequest;
use App\Http\Requests\View\StepTwoApplicantRequest;
use App\Http\Requests\View\StepThreeApplicantRequest;
use App\Http\Requests\View\Message\ValidateApplicant;
use App\Models\Banco;
use App\Models\Colegio;
use App\Models\Pais;
use App\Models\ProgramaAcademico;
use Carbon\Carbon;

class Applicant extends Component
{
  use WithFileUploads;
  public Postulante $applicant;
  public Banco $bank;
  public $departaments;
  public $provincesBirth;
  public $districtsBirth;
  public $selectedProvinceBirthId;
  public $provincesReside;
  public $districtsReside;
  public $countries;
  public $selectedProvinceResideId;
  public $provincesOriginSchool;
  public $districtsOriginSchool;
  public $selectedProvinceOriginSchoolId;
  public $selectedDistrictOriginSchoolId;
  public $adressType;
  public $generos;
  public $schools;
  public $sedes;
  public $modalities;
  public $academicPrograms;
  public $searchSchoolName;
  public $typeSchool;
  public int $currentStep = 1;
  public int $minimumYear = 1940;
  public $profilePhoto;
  public $reverseDniPhoto;
  public $frontDniPhoto;
  public $photo;
  public $formattedToday;
  public bool $accordance = false;
  public bool $showSchools = false;
  public bool $alertAmountModality = false;
  public $tipo_documento;
  protected $messages = ValidateApplicant::MESSAGES_ERROR;

  protected function rules()
  {
    $request = new StoreApplicantRequest();
    return $request->rules();
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function mount(Postulante $responseApiReniec, Banco $bank)
  {
    $this->applicant = $responseApiReniec;
    $this->bank = $bank;
    $this->departaments = Departamento::all();
    $this->provincesBirth = Provincia::all();
    $this->districtsBirth = Distrito::all();
    $this->provincesReside = Provincia::all();
    $this->districtsReside = Distrito::all();
    $this->provincesOriginSchool = Provincia::all();
    $this->districtsOriginSchool = Distrito::all();
    $this->adressType = TipoDireccion::all();
    $this->generos = Genero::all();
    $this->countries = Pais::all();
    $this->sedes = Sede::where('estado', 1)->get();
    $this->modalities = Modalidad::where('estado', 1)->get();
    $today = Carbon::now()->locale('es_PE');
    $this->formattedToday = $today->isoFormat('D [de] MMMM [del] YYYY');
    $this->tipo_documento = $this->bank->tipo_doc_depo;
  }

  public function render()
  {
    if ($this->selectedDistrictOriginSchoolId) {
      $ubigeoDistrito = Distrito::find($this->selectedDistrictOriginSchoolId)->ubigeo;
      $this->schools = Colegio::where('nombre', 'like', '%' . $this->searchSchoolName . '%')
        ->where('tipo', $this->typeSchool)
        ->where('ubigeo', $ubigeoDistrito)
        ->get();

      if ($this->schools->isEmpty() && $this->typeSchool && $this->searchSchoolName != '') {
        session()->flash('null', 'colegio no encontrado.');
      }
    }
    return view('livewire.applicant');
  }

  public function changePlaceBirth(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesBirth = Departamento::find($idlocation)->provincias()->get();
      $provinceBirthId = $this->provincesBirth->first()->id;
      $this->districtsBirth = Provincia::find($provinceBirthId)->distritos()->get();
      $this->reset('selectedProvinceBirthId');
    } elseif ($action == 'PROVINCE') {
      $this->districtsBirth = Provincia::find($idlocation)->distritos()->get();
    }
    $this->applicant->distrito_nac_id = null;
  }

  public function changePlaceReside(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesReside = Departamento::find($idlocation)->provincias()->get();
      $provinceResideId = $this->provincesReside->first()->id;
      $this->districtsReside = Provincia::find($provinceResideId)->distritos()->get();
      $this->reset('selectedProvinceResideId');
    } elseif ($action == 'PROVINCE') {
      $this->districtsReside = Provincia::find($idlocation)->distritos()->get();
    }
    $this->applicant->distrito_res_id = null;
  }

  public function changePlaceOriginSchool(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesOriginSchool = Departamento::find($idlocation)->provincias()->get();
      $provinceOriginSchoolId = $this->provincesOriginSchool->first()->id;
      $this->districtsOriginSchool = Provincia::find($provinceOriginSchoolId)->distritos()->get();
      $this->reset(['selectedProvinceOriginSchoolId', 'selectedDistrictOriginSchoolId', 'searchSchoolName']);
    } elseif ($action == 'PROVINCE') {
      $this->districtsOriginSchool = Provincia::find($idlocation)->distritos()->get();
      $this->reset(['selectedDistrictOriginSchoolId']);
    }
  }

  public function resetSchoolId()
  {
    $this->reset(['searchSchoolName', 'showSchools']);
    $this->applicant->colegio_id = null;
    $this->applicant->modalidad_id = null;
  }

  public function updateSchool(int $idSchool)
  {
    $school = Colegio::find($idSchool);
    $this->searchSchoolName = $school->nombre;
    $this->applicant->colegio_id = $school->id;
    $this->showSchools = false;
  }

  public function nextStep()
  {
    if ($this->currentStep == 1) {
      $this->validate(FirstStepApplicantRequest::FIRST_STEP_VALIDATE);
    } elseif ($this->currentStep == 2) {
      $this->validate(StepTwoApplicantRequest::SETEP_TWO_VALIDATE);
    } elseif ($this->currentStep == 3) {
      $this->validate(StepThreeApplicantRequest::SETEP_TWO_VALIDATE);
    }
    $this->currentStep++;
  }

  public function validateModality(int $idModalidad)
  {
    $modality = Modalidad::find($idModalidad);
    $amount = ($this->typeSchool == 1) ? $modality->monto_nacional : $modality->monto_particular;
    if ($amount > $this->bank->importe) {
      $this->applicant->modalidad_id = null;
      $this->alertAmountModality = true;
    } else {
      $this->minimumYear = ($idModalidad == 3) ? date('Y') - 2 : (($idModalidad == 10) ? date('Y') : 1940);
      $this->applicant->anno_egreso = null;
      $this->alertAmountModality = false;
      $this->academicPrograms = DistribucionVacante::where('modalidad_id', $idModalidad)->get();
    }
  }

  public function previousStep()
  {
    $this->reset(['profilePhoto', 'reverseDniPhoto', 'frontDniPhoto']);
    $this->currentStep--;
  }
}
