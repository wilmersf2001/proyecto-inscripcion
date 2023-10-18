<?php

namespace App\Http\Controllers;

use App\Services\ApiReniecService;
use Illuminate\Http\Request;

class PayController extends Controller
{
    protected ApiReniecService $apiReniec;
    public function __construct(ApiReniecService $apiReniec) {
        $this->apiReniec = $apiReniec;
    }
    public function validatePayment(Request $request){
        dd($request->all(), $this->apiReniec->getApplicantDataByDni($request->dni));
    }
}
