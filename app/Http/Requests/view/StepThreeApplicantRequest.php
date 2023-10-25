<?php

namespace App\Http\Requests\View;

class StepThreeApplicantRequest
{
  public const SETEP_TWO_VALIDATE = [
    'profilePhoto' => 'required|image|max:1024',
    'reverseDniPhoto' => 'required|image|max:1024',
    'frontDniPhoto' => 'required|image|max:1024',
    'accordance' => 'required|accepted',
  ];
}