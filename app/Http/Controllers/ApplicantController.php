<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiReniecService;

class ApplicantController extends Controller
{
  public function store(Request $request)
  {
    dd($request->all());
  }
}
