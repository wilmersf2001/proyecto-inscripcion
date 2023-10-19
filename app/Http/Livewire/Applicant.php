<?php

namespace App\Http\Livewire;

use App\Models\Postulante;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\TipoDireccion;
use App\Http\Requests\View\StoreApplicantRequest;

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
  public $currentStep = 1;


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
  }

  public function render()
  {
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

  public function nextStep()
  {
    if ($this->currentStep == 1) {
      $this->validate([
        'applicant.postulante_nombres' => 'required',
        'applicant.postulante_apPaterno' => 'required',
        'applicant.postulante_apMaterno' => 'required',
        'applicant.postulante_fechNac' => 'required|date',
        'applicant.sexo_id' => 'required',
        'applicant.distrito_id' => 'required',
        'applicant.distrito_id_direccion' => 'required',
        'applicant.tipodireccion_id' => 'required',
        'applicant.postulante_direccion' => 'required',
        'applicant.postulante_telefono' => 'required|numeric|digits:9',
        'applicant.postulante_telefonoAp' => 'required|numeric|digits:9',
        'applicant.postulante_correo' => 'required|email',
      ]);

      $this->currentStep++;
    } elseif ($this->currentStep == 2) {
      $this->validate([]);
    }
    /*     $this->currentStep++; */
  }

  public function previousStep()
  {
    $this->currentStep--;
  }
}
