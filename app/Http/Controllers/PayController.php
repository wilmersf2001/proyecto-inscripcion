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
    $numDocument = $request->numDocument;
    $idBank = $request->idBank;
    $bank = Banco::find($idBank);
    if (!$bank) {
      return redirect()->route('start');
    }
    if($bank->estado == 1){
      return redirect()->route('start')->with('alert', 'El voucher ya fue registrado');
    }
    $applicant = $this->apiReniec->getApplicantDataByDni($numDocument);
    return view('register-applicant', compact('applicant', 'bank'));
  }
}
