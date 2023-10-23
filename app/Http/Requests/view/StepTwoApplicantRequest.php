<?php

namespace App\Http\Requests\View;

class StepTwoApplicantRequest
{
  public const SETEP_TWO_VALIDATE = [
    'applicant.sede_id' => 'required|numeric',
    'applicant.escuela_id' => 'required|numeric',
    'applicant.postulante_numvecesu' => 'required|numeric|integer|gte:0',
    'applicant.postulante_numveceso' => 'required|numeric|integer|gte:0',
    'applicant.colegio_id' => 'required|numeric',
    'applicant.postulante_anoEgreso' => 'required|numeric|digits:4',
    'applicant.modalidad_id' => 'required|numeric',
    'typeSchool' => 'required|numeric',
    'selectedDepartmentCollegeId' => 'required|numeric',
  ];
}
