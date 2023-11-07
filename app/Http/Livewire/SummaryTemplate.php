<?php

namespace App\Http\Livewire;

use App\Models\Postulante;
use Livewire\Component;
use Carbon\Carbon;

class SummaryTemplate extends Component
{
  public Postulante $applicant;
  public string $nameSexo;
  public $formattedDateNac;
  public string $distrit;
  public string $districtAddress;
  public string $typeAddress;
  public string $districtSchool;
  public string $nameSchool;
  public string $sede;
  public string $programAcademic;
  public string $modality;
  public $tipo_documento;

  public function mount(Postulante $applicant, int $tipo_documento)
  {
    $this->applicant = $applicant;
    $this->tipo_documento = $tipo_documento;
  }
  public function render()
  {
    $dateNac = Carbon::create($this->applicant->fecha_nacimiento)->locale('es_PE');
    $this->formattedDateNac = $dateNac->isoFormat('D [de] MMMM [del] YYYY');
    $this->nameSexo = $this->applicant->sexo->descripcion;
    $this->distrit = $this->applicant->distritoNac->nombre;
    $this->districtAddress = $this->applicant->distritoRes->nombre;
    $this->typeAddress = $this->applicant->tipodireccion->descripcion;
    $this->districtSchool = $this->applicant->colegio->distrito;
    $this->nameSchool = $this->applicant->colegio->nombre;
    $this->sede = $this->applicant->sede->nombre;
    $this->programAcademic = $this->applicant->programaAcademico->nombre;
    $this->modality = $this->applicant->modalidad->descripcion;
    return view('livewire.summary-template');
  }
}
