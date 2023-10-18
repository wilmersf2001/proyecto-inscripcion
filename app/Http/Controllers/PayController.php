<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePaymentRequest;
use App\Services\ApiReniecService;
use Illuminate\Http\Request;

class PayController extends Controller
{
    protected ApiReniecService $apiReniec;
    public function __construct(ApiReniecService $apiReniec) {
        $this->apiReniec = $apiReniec;
    }
    public function validatePayment(ValidatePaymentRequest $request){
        $applicant = $this->apiReniec->getApplicantDataByDni($request->dni);
        /* dd($applicant); */
        return view('applicant-registration', compact('applicant'));
    }
}
