<?php

namespace App\Http\Livewire;

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
use App\Http\Requests\View\Message\ValidateApplicant;
use App\Models\Banco;
use App\Models\Colegio;
use App\Models\Escuela;

class Applicant extends Component
{
  public Postulante $applicant;
  public Banco $bank;
  public $departaments;
  public $provincesBirth;
  public $districtsBirth;
  public $selectedProvinceBirthId;
  public $provincesReside;
  public $districtsReside;
  public $selectedProvinceResideId;
  public $adressType;
  public $generos;
  public $schools;
  public $sedes;
  public $modalities;
  public $academicPrograms;
  public $searchSchoolName;
  public $selectedDepartmentCollegeId;
  public $typeSchool;
  public int $currentStep = 2;
  public bool $showSchools = false;
  public int $minimumYear = 1940;
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
    $this->adressType = TipoDireccion::all();
    $this->academicPrograms = Escuela::all();
    $this->generos = Genero::all();
    $this->sedes = Sede::all();
    $this->modalities = Modalidad::all();
  }

  public function render()
  {
    $this->schools = Colegio::where('departamento_id', $this->selectedDepartmentCollegeId)
      ->where('colegio_descripcion', 'like', '%' . $this->searchSchoolName . '%')
      ->where('colegio_tipocolegio', $this->typeSchool)
      ->get();

    if ($this->schools->isEmpty() && $this->selectedDepartmentCollegeId && $this->typeSchool) {
      session()->flash('null', 'colegio no encontrado.');
    }
    return view('livewire.applicant');
  }

  public function changePlaceBirth(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesBirth = Departamento::where('departamento_id', $idlocation)->first()->provincias;
      $this->selectedProvinceBirthId = $this->provincesBirth->first()->provincia_id;
      $this->districtsBirth = Provincia::where('provincia_id', $this->selectedProvinceBirthId)->first()->distritos;
    } elseif ($action == 'PROVINCE') {
      $this->districtsBirth = Provincia::where('provincia_id', $idlocation)->first()->distritos;
    }
  }

  public function changePlaceReside(string $action, int $idlocation)
  {
    if ($action == 'DEPARTMENT') {
      $this->provincesReside = Departamento::where('departamento_id', $idlocation)->first()->provincias;
      $this->selectedProvinceResideId = $this->provincesReside->first()->provincia_id;
      $this->districtsReside = Provincia::where('provincia_id', $this->selectedProvinceResideId)->first()->distritos;
    } elseif ($action == 'PROVINCE') {
      $this->districtsReside = Provincia::where('provincia_id', $idlocation)->first()->distritos;
    }
  }

  public function resetSchoolId()
  {
    $this->reset(['searchSchoolName', 'showSchools']);
    $this->applicant->colegio_id = null;
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
    }
    $this->currentStep++;
  }

  public function validateModality(int $idModalidad)
  {
    $modalityYear = ($idModalidad == 3) ? date('Y') - 2 : (($idModalidad == 10) ? date('Y') : 1940);
    $this->minimumYear = $modalityYear;
    $this->applicant->postulante_anoEgreso = null;
  }

  public function previousStep()
  {
    $this->currentStep--;
  }
}
