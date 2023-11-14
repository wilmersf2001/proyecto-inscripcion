<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicantRequest;
use App\Models\Banco;
use App\Models\Postulante;
use App\Utils\Constants;
use App\Utils\UtilFunction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
  private function uploadImage($file, string $name, string $destination)
  {
    if ($file) {
      $filename = $name . '.' . $file->getClientOriginalExtension();
      Storage::disk(Constants::DISK_STORAGE)->put($destination . $filename, file_get_contents($file));
    }
  }
  public function store(StoreApplicantRequest $request)
  {
    $banco = Banco::find($request->banco_id);
    if (!$banco) {
      return response()->json(['error' => 'Banco no encontrado'], 404);
    }

    $banco->update([
      'estado' => 1,
    ]);

    Postulante::create([
      'num_documento' => $request->num_documento,
      'tipo_documento' => $request->tipo_documento,
      'num_voucher' => $request->num_voucher,
      'nombres' => $request->nombres,
      'ap_paterno' => $request->ap_paterno,
      'ap_materno' => $request->ap_materno,
      'fecha_nacimiento' => $request->fecha_nacimiento,
      'sexo_id' => $request->sexo_id,
      'distrito_nac_id' => $request->distrito_nac,
      'distrito_res_id' => $request->distrito_res,
      'tipo_direccion_id' => $request->tipo_direccion,
      'direccion' => $request->direccion,
      'telefono' => $request->telefono,
      'telefono_ap' => $request->telefono_ap,
      'correo' => $request->correo,
      'colegio_id' => $request->colegio_id,
      'num_veces_otros' => $request->num_veces_otro,
      'sede_id' => $request->sede_id,
      'pais_id' => $request->tipo_documento == 1 ? 134 : $request->pais_id,
      'programa_academico_id' => $request->programa_academico_id,
      'num_veces_unprg' => $request->num_veces_unprg,
      'modalidad_id' => $request->modalidad_id,
      'anno_egreso' => $request->anno_egreso,
      'fecha_inscripcion' => now(),
      'codigo' => $request->tipo_documento == 1 ? $request->num_documento : substr($request->num_documento, 1),
      'estado_postulante_id' => '1',
    ]);

    $this->uploadImage($request->file('profilePhoto'), $request->num_documento, Constants::RUTA_FOTO_CARNET_INSCRIPTO);
    $this->uploadImage($request->file('reverseDniPhoto'), 'R-' . $request->num_documento, Constants::RUTA_DNI_REVERSO_INSCRIPTO);
    $this->uploadImage($request->file('frontDniPhoto'), 'A-' . $request->num_documento, Constants::RUTA_DNI_ANVERSO_INSCRIPTO);

    UtilFunction::saveQr($request->all());

    return redirect()->route('applicant.finalMessage');
  }

  public function finalMessage()
  {
    return view('final-message');
  }
}
