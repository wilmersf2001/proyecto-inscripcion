<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePaymentRequest;
use Illuminate\Http\Request;

class PayController extends Controller
{
  public function validatePayment(ValidatePaymentRequest $request)
  {
    $dni = $request->dni;
    return redirect()->route('applicant.redirectRegisterApplicant')->with('dni', $dni);
  }
}
