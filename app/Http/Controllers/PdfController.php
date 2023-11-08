<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidatePdfRequest;
use App\Models\Postulante;
use App\Models\Proceso;
use App\Utils\UtilFunction;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
  public function __invoke()
  {
    return view('ficha-inscripcion');
  }
  public function validatePdf(ValidatePdfRequest $request)
  {
    $applicant = Postulante::where('num_documento', $request->num_documento)
      ->where('num_voucher', $request->num_voucher)
      ->first();

    if (!$applicant) {
      return redirect()->route('pdf.startPdfQuery')->with('error', 'Postulante no registrado o datos incorrectos');
    }

    if ($applicant->estadoObservadoFichaInscripcion()) {
      return view('rectifier-photo-applicant', compact('applicant'));
    }

    if ($applicant->estadoValidoFichaInscripcion()) {
      $today = UtilFunction::getDateToday();
      $pathImage = UtilFunction::getImagePathByDni($request->num_documento);
      $process = Proceso::getProcessNumber();

      $data = [
        'postulante' => $applicant,
        'resultadoQr' => UtilFunction::dataQr($applicant->id),
        'escuela' => $applicant->programaAcademico->nombre,
        'modalidad' => $applicant->modalidad->descripcion,
        'sede' => $applicant->sede->nombre,
        'colegio' => $applicant->colegio->nombre,
        'distritoNacimiento' => $applicant->distritoNac->nombre,
        'process' => $process,
        'today' => $today,
        'pathImage' => $pathImage,
        'tipoColegio' => $applicant->colegio->tipo == 1 ? 'Nacional' : 'Privado'
      ];
    } else {
      return redirect()->route('pdf.startPdfQuery')->with('error', 'Ficha de inscripción en proceso de validación');
    }

    return PDF::loadView('pdf-ficha-inscripcion', $data)->stream();
  }
}
