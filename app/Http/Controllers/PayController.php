<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePaymentRequest;
use App\Models\Banco;
use Illuminate\Http\Request;
use App\Services\ApiReniecService;

class PayController extends Controller
{
  protected ApiReniecService $apiReniec;

  public function __construct(ApiReniecService $apiReniec)
  {
    $this->apiReniec = $apiReniec;
  }

  public function __invoke()
  {
    return view('validate-payment');
  }

  public function validatePayment(ValidatePaymentRequest $request)
  {
    /* validacion */
    $dni = $request->dni;
    $applicant = $this->apiReniec->getApplicantDataByDni($dni);
    $bank = Banco::where('NumSecuencia', 2)->first();
    return view('register-applicant', compact('applicant', 'bank'));
  }
}
