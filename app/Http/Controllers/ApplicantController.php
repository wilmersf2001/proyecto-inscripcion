<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Models\Postulante;
use App\Utils\UtilFunction;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
  private function uploadImage($file, string $name, string $destination)
  {
    if ($file) {
      $nombreArchivo = $name . '.' . $file->getClientOriginalExtension();
      $file->move(public_path($destination), $nombreArchivo);
    }
  }
  public function store(StoreApplicantRequest $request)
  {
    $utilFunction = new UtilFunction();
    
    Postulante::create([
      'postulante_numDocumento' => $request->dni,
      'postulante_voucher' => $request->num_voucher,
      'postulante_nombres' => $request->nombres,
      'postulante_apPaterno' => $request->ap_paterno,
      'postulante_apMaterno' => $request->ap_materno,
      'postulante_fechNac' => $request->fecha_nacimiento,
      'sexo_id' => $request->sexo_id,
      'distrito_id' => $request->distrito_nac,
      'distrito_id_direccion' => $request->distrito_res,
      'tipodireccion_id' => $request->tipo_direccion,
      'postulante_direccion' => $request->direccion,
      'postulante_telefono' => $request->telefono,
      'postulante_telefonoAp' => $request->telefono_ap,
      'postulante_correo' => $request->correo,
      'colegio_id' => $request->colegio_id,
      'postulante_numveceso' => $request->num_veces_otro,
      'sede_id' => $request->sede_id,
      'escuela_id' => $request->programa_academico_id,
      'postulante_numvecesu' => $request->num_veces_unprg,
      'modalidad_id' => $request->modalidad_id,
      'postulante_anioEgres' => $request->anno_egreso,
      'postulante_fechInsc' => now(),
      'postulante_codigopostulante' => '001061', // esto es de prueba
      'postulante_estado' => '1',
    ]);

    $this->uploadImage($request->file('profilePhoto'), 'P-' . $request->dni, 'archivos/FotoPerfil');
    $this->uploadImage($request->file('reverseDniPhoto'), 'R-' . $request->dni, 'archivos/DniReverso');
    $this->uploadImage($request->file('frontDniPhoto'), 'A-' . $request->dni, 'archivos/DniAnverso');

    $utilFunction->saveQr($request->all());

    return redirect()->route('applicant.ending');
  }


  public function ending()
  {
    return view('ending');
  }
}
