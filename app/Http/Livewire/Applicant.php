<?php

namespace App\Http\Livewire;

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
use App\Models\Escuela;
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
  public $formattedToday;
  public bool $accordance = false;
  public bool $showSchools = false;
  public bool $alertAmountModality = false;
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
    $this->academicPrograms = Escuela::all();
    $this->generos = Genero::all();
    $this->sedes = Sede::all();
    $this->modalities = Modalidad::all();
    $today = Carbon::now()->locale('es_PE');
    $this->formattedToday = $today->isoFormat('D [de] MMMM [del] YYYY');
  }

  public function render()
  {
    if ($this->selectedDistrictOriginSchoolId) {
      $ubigeoDistrito = Distrito::where("distrito_id", $this->selectedDistrictOriginSchoolId)->first()->distrito_ubigeo;
      $this->schools = Colegio::where('colegio_descripcion', 'like', '%' . $this->searchSchoolName . '%')
        ->where('colegio_tipocolegio', $this->typeSchool)
        ->where('colegio_ubigeo', $ubigeoDistrito)
        ->get();
      if ($this->schools->isEmpty() && $this->typeSchool && $this->searchSchoolName != '' ) {
        session()->flash('null', 'colegio no encontrado.');
      }
    }
    return view('livewire.applicant');
  }

  public function changePlaceBirth(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesBirth = Departamento::where('departamento_id', $idlocation)->first()->provincias;
      $provinceBirthId = $this->provincesBirth->first()->provincia_id;
      $this->districtsBirth = Provincia::where('provincia_id', $provinceBirthId)->first()->distritos;
      $this->reset('selectedProvinceBirthId');
    } elseif ($action == 'PROVINCE') {
      $this->districtsBirth = Provincia::where('provincia_id', $idlocation)->first()->distritos;
    }
    $this->applicant->distrito_id = null;
  }

  public function changePlaceReside(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesReside = Departamento::where('departamento_id', $idlocation)->first()->provincias;
      $provinceResideId = $this->provincesReside->first()->provincia_id;
      $this->districtsReside = Provincia::where('provincia_id', $provinceResideId)->first()->distritos;
      $this->reset('selectedProvinceResideId');
    } elseif ($action == 'PROVINCE') {
      $this->districtsReside = Provincia::where('provincia_id', $idlocation)->first()->distritos;
    }
    $this->applicant->distrito_id_direccion = null;
  }

  public function changePlaceOriginSchool(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesOriginSchool = Departamento::where('departamento_id', $idlocation)->first()->provincias;
      $provinceOriginSchoolId = $this->provincesOriginSchool->first()->provincia_id;
      $this->districtsOriginSchool = Provincia::where('provincia_id', $provinceOriginSchoolId)->first()->distritos;
      $this->reset(['selectedProvinceOriginSchoolId', 'selectedDistrictOriginSchoolId']);
    } elseif ($action == 'PROVINCE') {
      $this->districtsOriginSchool = Provincia::where('provincia_id', $idlocation)->first()->distritos;
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
    $school = Colegio::where('colegio_id', $idSchool)->first();
    $this->searchSchoolName = $school->colegio_descripcion;
    $this->applicant->colegio_id = $school->colegio_id;
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
    $modality = Modalidad::where('modalidad_id', $idModalidad)->first();
    $amount = ($this->typeSchool == 1) ? $modality->modalidad_montonacional : $modality->modalidad_montoparticular;
    if ($amount > $this->bank->Importe) {
      $this->applicant->modalidad_id = null;
      $this->alertAmountModality = true;
    } else {
      $modalityYear = ($idModalidad == 3) ? date('Y') - 2 : (($idModalidad == 10) ? date('Y') : 1940);
      $this->minimumYear = $modalityYear;
      $this->applicant->postulante_anoEgreso = null;
      $this->alertAmountModality = false;
    }
  }

  public function previousStep()
  {
    $this->currentStep--;
  }
}
