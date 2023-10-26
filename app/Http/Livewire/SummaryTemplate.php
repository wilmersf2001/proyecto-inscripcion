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

  public function mount(Postulante $applicant)
  {
    $this->applicant = $applicant;
  }
  public function render()
  {
    $this->applicant = Postulante::find(50);
    $dateNac = Carbon::create($this->applicant->postulante_fechNac)->locale('es_PE');
    $this->formattedDateNac = $dateNac->isoFormat('D [de] MMMM [del] YYYY');
    $this->nameSexo = $this->applicant->sexo->sexo_descripcion;
    $this->distrit = $this->applicant->distrito->distrito_descripcion;
    $this->districtAddress = $this->applicant->distritoDireccion->distrito_descripcion;
    $this->typeAddress = $this->applicant->tipodireccion->tipodireccion_descripcion;
    $this->districtSchool = $this->applicant->colegio->colegio_distrito;
    $this->nameSchool = $this->applicant->colegio->colegio_descripcion;
    $this->sede = $this->applicant->sede->sede_descripcion;
    $this->programAcademic = $this->applicant->escuela->escuela_descripcion;
    $this->modality = $this->applicant->modalidad->modalidad_descripcion;
  
    return view('livewire.summary-template');
  }
}
