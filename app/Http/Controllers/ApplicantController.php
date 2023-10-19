<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiReniecService;

class ApplicantController extends Controller
{
  protected ApiReniecService $apiReniec;
  
  public function __construct(ApiReniecService $apiReniec)
  {
    $this->apiReniec = $apiReniec;
  }

  public function redirectRegisterApplicant(Request $request)
  {
    $dni = $request->session()->get('dni');
    $applicant = $this->apiReniec->getApplicantDataByDni($dni);
    return view('register-applicant', compact('applicant'));
  }

  public function store(Request $request)
  {
    dd($request->all());
  }
}
