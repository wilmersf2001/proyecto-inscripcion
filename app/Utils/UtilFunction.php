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
  public function getDateToday()
  {
    $today = Carbon::now()->locale('es_PE');
    $formattedDate = $today->isoFormat('D [de] MMMM [del] YYYY');
    return $formattedDate;
  }

  public function saveQr(array $requestApplicant)
  {
    $process = new Proceso();
    $processNumber = $process->getProcessNumber();
    $nameQr = 'QR' . md5($requestApplicant['dni']);
    $dataQr = implode('-', [
      $requestApplicant['nombres'],
      $requestApplicant['ap_paterno'],
      $requestApplicant['ap_materno'],
      "DNI=" . $requestApplicant['dni'],
      "ADMISION $processNumber:{$requestApplicant['programa_academico_id']}",
      $requestApplicant['modalidad_id'],
    ]);
    $qrCode = QrCode::encoding('UTF-8')->generate($dataQr);
    $svgFile = public_path('temp/' . $nameQr . '.svg');
    file_put_contents($svgFile, $qrCode);
  }
  /* public function getImagePathByDni($dni)
  {
    $folderPath = public_path(Constantes::RUTA_FOTO_VALIDA);
    $dniPath = $folderPath . '/' . $dni . '.jpg';
    $applicantStatus = Postulante::where('postulante_numDocumento', $dni)->value('postulante_estado');
    if (in_array($applicantStatus, Constantes::ESTADOS_VALIDOS_POSTULANTE) && is_file($dniPath)) {
      return $dniPath;
    }
    return 0;
  } */
}
