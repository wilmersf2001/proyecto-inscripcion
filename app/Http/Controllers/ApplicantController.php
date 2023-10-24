<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
  public function store(Request $request)
  {
    dd($request->all());
  }
  public function uploadFile(UploadFileRequest $request)
  {
    $profilePhoto = $request->file('profilePhoto');
    $nombreArchivo = time() . '.' . $profilePhoto->getClientOriginalExtension();
    $profilePhoto->move(public_path('archivos/FotoPerfil'), $nombreArchivo);

    $reverseDniPhoto = $request->file('reverseDniPhoto');
    $nombreArchivo = time() . '.' . $reverseDniPhoto->getClientOriginalExtension();
    $reverseDniPhoto->move(public_path('archivos/DniReverso'), $nombreArchivo);

    $frontDniPhoto = $request->file('frontDniPhoto');
    $nombreArchivo = time() . '.' . $frontDniPhoto->getClientOriginalExtension();
    $frontDniPhoto->move(public_path('archivos/DniAnverso'), $nombreArchivo);

    return redirect()->route('applicant.ending');
  }
  public function ending(){
    return view('ending');
  }
}
