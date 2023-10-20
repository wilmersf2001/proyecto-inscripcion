<?php

namespace App\Http\Requests\View;

class FirstStepApplicantRequest
{
  public const FIRST_STEP_VALIDATE = [
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
  ];
}
