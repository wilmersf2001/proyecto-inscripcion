<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
  public function store(StoreApplicantRequest $request)
  {
    dd($request->all());
  }
  
  public function ending(){
    return view('ending');
  }
}
