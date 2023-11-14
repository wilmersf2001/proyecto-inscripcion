<?php

namespace App\Http\Livewire;

use App\Models\DistribucionVacante;
use App\Services\FormDataService;
use App\Services\LocationService;
use App\Utils\UtilFunction;
use Livewire\WithFileUploads;
use App\Models\Postulante;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Http\Requests\View\StoreApplicantRequest;
use App\Http\Requests\View\FirstStepApplicantRequest;
use App\Http\Requests\View\StepTwoApplicantRequest;
use App\Http\Requests\View\StepThreeApplicantRequest;
use App\Http\Requests\View\Message\ValidateApplicant;
use App\Models\Banco;
use App\Models\Colegio;


class Applicant extends Component
{
  use WithFileUploads;

  protected $locationService;
  protected $formDataService;
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
  public $selectedDepartamentOriginSchoolId;
  public $selectedProvinceOriginSchoolId;
  public $selectedDistrictOriginSchoolId;
  public $adressType;
  public $generos;
  public $schools;
  public $sedes;
  public $modalities;
  public $academicPrograms;
  public $searchSchoolName;
  public $disable;
  public $typeSchool;
  public $profilePhoto;
  public $reverseDniPhoto;
  public $frontDniPhoto;
  public $formattedToday;
  public $currentStep = 1;
  public $minimumYear = 1940;
  public $accordance = false;
  public $showSchools = false;
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

  public function mount(Postulante $responseApiReniec, Banco $bank, $typeSchool, LocationService $locationService, FormDataService $formDataService)
  {
    $this->applicant = $responseApiReniec;
    $this->bank = $bank;
    $this->locationService = $locationService;
    $this->formDataService = $formDataService;
    $this->departaments =  $this->locationService->getDepartments();
    $this->provincesBirth = $this->locationService->getProvinces();
    $this->districtsBirth = $this->locationService->getDistricts();
    $this->provincesReside = $this->locationService->getProvinces();
    $this->districtsReside = $this->locationService->getDistricts();
    $this->provincesOriginSchool = $this->locationService->getProvinces();
    $this->districtsOriginSchool = $this->locationService->getDistricts();
    $this->countries = $this->locationService->getCountries();
    $this->adressType = $this->formDataService->getAdressType();
    $this->generos = $this->formDataService->getGeneros();
    $this->sedes = $this->formDataService->getSedes();
    $this->modalities = $this->formDataService->getModalities();
    $this->academicPrograms = DistribucionVacante::getProgramasAcademicosByModalidad($this->applicant->modalidad_id);
    $this->formattedToday = UtilFunction::getDateToday();
    $this->typeSchool = $typeSchool;
    $this->disable = $this->applicant->nombres != null ? 1 : 0;
    $this->minimumYear = UtilFunction::getMinimumYearByModalidad($this->applicant->modalidad_id);
    $this->selectedDepartamentOriginSchoolId = $bank->tipo_doc_depo == 1 ? "" : 26;
    $this->selectedProvinceOriginSchoolId = $bank->tipo_doc_depo == 1 ? "" : 197;
    $this->selectedDistrictOriginSchoolId = $bank->tipo_doc_depo == 1 ? "" : 1868;
    $this->searchSchoolName = $typeSchool == 1 ? "OTROS COLEGIOS NACIONALES" : "OTROS COLEGIOS PARTICULARES";
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

  public function previousStep()
  {
    $this->reset(['profilePhoto', 'reverseDniPhoto', 'frontDniPhoto']);
    $this->currentStep--;
  }
}
