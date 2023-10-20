<?php

namespace App\Http\Livewire;

use App\Models\Genero;
use App\Models\Postulante;
use App\Models\Sede;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\TipoDireccion;
use App\Http\Requests\View\StoreApplicantRequest;
use App\Http\Requests\View\FirstStepApplicantRequest;
use App\Models\Colegio;
use App\Models\Escuela;

class Applicant extends Component
{
  public $applicant;
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
  public $academicPrograms;
  public $searchSchoolName;
  public $selectedDepartmentCollegeId = 1;
  public $currentStep = 2;


  protected function rules()
  {
    $request = new StoreApplicantRequest();
    return $request->rules();
  }

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function mount(Postulante $responseApiReniec)
  {
    $this->applicant = $responseApiReniec;
    $this->departaments = Departamento::all();
    $this->provincesBirth = Provincia::all();
    $this->districtsBirth = Distrito::all();
    $this->provincesReside = Provincia::all();
    $this->districtsReside = Distrito::all();
    $this->adressType = TipoDireccion::all();
    $this->academicPrograms = Escuela::all();
    $this->generos = Genero::all();
    $this->sedes = Sede::all();
    $this->applicant->sexo_id = 1;
    $this->applicant->sede_id = 1;
    $this->applicant->colegio_id = 1;
    $this->applicant->escuela_id = 1;
    $this->applicant->postulante_numvecesu = 0;
    $this->applicant->postulante_numveceso = 0;
    $this->applicant->distrito_id = $this->districtsBirth->first()->distrito_id;
    $this->applicant->distrito_id_direccion = $this->districtsReside->first()->distrito_id;
    $this->applicant->tipodireccion_id = $this->adressType->first()->tipodireccion_id;
    $this->searchSchoolName = Colegio::where('departamento_id', $this->selectedDepartmentCollegeId)->first()->colegio_descripcion;
  }

  public function render()
  {
    $this->schools = Colegio::where('departamento_id', $this->selectedDepartmentCollegeId)
      ->where('colegio_descripcion', 'like', '%' . $this->searchSchoolName . '%')
      ->get();

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
    $this->applicant->distrito_id = $this->districtsBirth->first()->distrito_id;
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
    $this->applicant->distrito_id_direccion = $this->districtsReside->first()->distrito_id;
  }

  public function getCollegeByDepartment(int $idDepartment)
  {
    $school = Colegio::where('departamento_id', $idDepartment)->first();
    $this->searchSchoolName = $school->colegio_descripcion;
    $this->applicant->colegio_id = $school->colegio_id;
    $this->selectedDepartmentCollegeId = $idDepartment;
  }

  public function updateSchool(int $idSchool)
  {
    $school = Colegio::where('colegio_id', $idSchool)->first();
    $this->searchSchoolName = $school->colegio_descripcion;
    $this->applicant->colegio_id = $school->colegio_id;
  }

  public function nextStep()
  {
    if ($this->currentStep == 1) {
      $this->validate(FirstStepApplicantRequest::FIRST_STEP_VALIDATE);
    } elseif ($this->currentStep == 2) {
      $this->validate([
        'applicant.sede_id' => 'required|numeric',
        'applicant.escuela_id' => 'required|numeric',
        'applicant.postulante_numvecesu' => 'required|numeric',
        'applicant.postulante_numveceso' => 'required|numeric',
      ]);
    }
    $this->currentStep++;
  }

  public function previousStep()
  {
    $this->currentStep--;
  }
}
