<?php

namespace App\Utils;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use App\Models\Colegio;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Postulante;
use App\Models\Proceso;
use App\Models\Provincia;
use Carbon\Carbon;


class  UtilFunction
{
  public static function saveQr(array $requestApplicant)
  {
    $processNumber = Proceso::getProcessNumber();
    $nameQr = 'QR' . md5($requestApplicant['num_documento']);
    $dataQr = implode('-', [
      $requestApplicant['nombres'],
      $requestApplicant['ap_paterno'],
      $requestApplicant['ap_materno'],
      "DNI=" . $requestApplicant['num_documento'],
      "ADMISION $processNumber:{$requestApplicant['programa_academico_id']}",
      $requestApplicant['modalidad_id'],
    ]);
    $qrCode = QrCode::encoding('UTF-8')->generate($dataQr);
    $svgFile = public_path('temp/' . $nameQr . '.svg');
    file_put_contents($svgFile, $qrCode);
  }

  public function getDateToday()
  {
    $today = Carbon::now()->locale('es_PE');
    $formattedDate = $today->isoFormat('D [de] MMMM [del] YYYY');
    return $formattedDate;
  }

  public function getImagePathByDni($dni)
  {
    $folderPath = public_path(Constants::RUTA_FOTO_VALIDA);
    $dniPath = $folderPath . '/' . $dni . '.jpg';
    $applicantStatus = Postulante::where('num_documento', $dni)->value('estado_postulante_id');
    if (in_array($applicantStatus, Constants::ESTADOS_VALIDOS_POSTULANTE) && is_file($dniPath)) {
      return $dniPath;
    }
    return 0;
  }

  public function dataQr($idApplicant)
  {
    $process = new Proceso();
    $process = $process->getProcessNumber();
    $applicant = Postulante::find($idApplicant);
    $response = implode('-', [
      $applicant->nombres,
      $applicant->ap_paterno,
      $applicant->ap_materno,
      "DNI=" . $applicant->num_documento,
      "ADMISION $process:{$applicant->escuela_id}",
      $applicant->modalidad_id
    ]);
    return $response;
  }
}
