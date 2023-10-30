<?php

namespace App\Http\Requests\View;

class StepThreeApplicantRequest
{
  public const SETEP_TWO_VALIDATE = [
    'profilePhoto' => 'required|mimes:jpeg,png|max:1024',
    'reverseDniPhoto' => 'required|mimes:jpeg,png|max:1024',
    'frontDniPhoto' => 'required|mimes:jpeg,png|max:1024',
  ];
}
