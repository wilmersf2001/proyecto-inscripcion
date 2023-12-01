<?php

namespace App\Utils;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Services\FormDataService;
use App\Models\Postulante;
use App\Models\Distrito;
use App\Models\Proceso;
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
    $filename = $nameQr . '.svg';
    Storage::disk(Constants::DISK_STORAGE)->put(Constants::RUTA_FOTO_QR . $filename, $qrCode);
  }

  public static function getDateToday()
  {
    $today = Carbon::now()->locale('es_PE');
    $formattedDate = $today->isoFormat('D [de] MMMM [del] YYYY');
    return $formattedDate;
  }

  public static function getImagePathByDni($dni)
  {
    $urlPhotoValid = Constants::RUTA_FOTO_CARNET_VALIDA . $dni . '.jpg';
    $dniPath = Storage::url($urlPhotoValid);
    $applicantStatus = Postulante::where('num_documento', $dni)->value('estado_postulante_id');
    if (in_array($applicantStatus, Constants::ESTADOS_VALIDOS_POSTULANTE) && Storage::disk(Constants::DISK_STORAGE)->exists($urlPhotoValid)) {
      return $dniPath;
    }
    return 0;
  }

  public static function photoCarnetExists($dni)
  {
    $urlPhotoValid = Constants::RUTA_FOTO_CARNET_VALIDA . $dni . '.jpg';
    $urlDniAnversoValid = Constants::RUTA_DNI_ANVERSO_VALIDA . 'A-' . $dni . '.jpg';
    $urlDniReversoValid = Constants::RUTA_DNI_REVERSO_VALIDA . 'R-' . $dni . '.jpg';

    $existsPhoto = Storage::disk(Constants::DISK_STORAGE)->exists($urlPhotoValid);
    $existsAnverso = Storage::disk(Constants::DISK_STORAGE)->exists($urlDniAnversoValid);
    $existsReverso = Storage::disk(Constants::DISK_STORAGE)->exists($urlDniReversoValid);

    return ($existsPhoto && $existsAnverso && $existsReverso);
  }

  public static function dataQr($idApplicant)
  {
    $process = Proceso::getProcessNumber();
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

  public static function getMinimumYearByModalidad($idModalidad)
  {
    $minimumYear = ($idModalidad == Constants::MODALIDAD_DOS_PRIMEROS_PUESTOS) ? date('Y') - 2 : (($idModalidad == Constants::MODALIDAD_QUINTO_SECUNDARIA) ? date('Y') : 1940);
    return $minimumYear;
  }

  public static function formattedDate($date)
  {
    $dateNac = Carbon::create($date)->locale('es_PE');
    return $dateNac->isoFormat('D [de] MMMM [del] YYYY');
  }

  public static function getPhotosObservedByDni(string $dni)
  {
    $pathFolderPhotosObserved = Constants::RUTA_FOTOS_OBSERVADAS;
    $pathFolderPhotosValid = Constants::RUTA_FOTOS_VALIDAS;
    $photosObserved = [];
    foreach ($pathFolderPhotosObserved as $i => $pathFolderPhotos) {
      if ($i == 0) {
        $filepath = $pathFolderPhotos . $dni . '.jpg';
        $verificationpath = $pathFolderPhotosValid[$i] . $dni . '.jpg';
      }
      if ($i == 1) {
        $filepath = $pathFolderPhotos . 'A-' . $dni . '.jpg';
        $verificationpath = $pathFolderPhotosValid[$i] . 'A-' . $dni . '.jpg';
      }
      if ($i == 2) {
        $filepath = $pathFolderPhotos . 'R-' . $dni . '.jpg';
        $verificationpath = $pathFolderPhotosValid[$i] . 'R-' . $dni . '.jpg';
      }

      if (Storage::disk(Constants::DISK_STORAGE)->exists($filepath) && !Storage::disk(Constants::DISK_STORAGE)->exists($verificationpath)) {
        $urlPhoto = Storage::url($filepath);
        $photosObserved[] = [
          'url' => $urlPhoto,
          'indicator' => $i,
          'name' => $i == 0 ? 'perfil' : ($i == 1 ? 'anverso' : 'reverso')
        ];
      }
    }
    return $photosObserved;
  }

  public static function getLocationByDistrict(Distrito $distric)
  {
    $distrito = $distric->nombre;
    $provincia = $distric->provincia->nombre;
    $departamento = $distric->provincia->departamento->nombre;
    return $distrito . ' | ' . $provincia . ' | ' . $departamento . ' | PERÚ';
  }

  public static function getLocationBySchoolUbigeo(string $ubigeo)
  {
    if ($ubigeo == '000000') {
      return 'OTROS PAISES';
    }
    $distrito = Distrito::where('ubigeo', $ubigeo)->first();
    $provincia = $distrito->provincia->nombre;
    $departamento = $distrito->provincia->departamento->nombre;
    return $distrito->nombre . ' | ' . $provincia . ' | ' . $departamento . ' | PERÚ';
  }

  public static function getLocationByPostulante(Postulante $applicant)
  {
    if ($applicant->tipo_documento == 1) {
      return self::getLocationByDistrict($applicant->distritoNac);
    }
    return $applicant->pais->nombre;
  }

  public static function getUniversitiesByModality(int $idModality, int $typeSchool, FormDataService $formDataService)
  {
    if (in_array($idModality, Constants::ESTADO_TITULADO_TRASLADO)) {
      return $typeSchool == 1 ? $formDataService->getPublicUniversities() : $formDataService->getPrivateUniversities();
    }
    return null;
  }
}
