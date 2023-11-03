<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePdfRequest;
use App\Models\Postulante;
use App\Models\Proceso;
use Illuminate\Http\Request;
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
    $process = new Proceso();
    $utilFunction = new UtilFunction();
    $applicant = Postulante::where('num_documento', $request->num_documento)
      ->where('num_voucher', $request->num_voucher)
      ->first();

    if (!$applicant) {
      return redirect()->route('pdf.startPdfQuery')->with('error', 'Postulante no registrado');
    }

    if ($applicant->estadoValidoFichaInscripcion()) {
      $today = $utilFunction->getDateToday();
      $pathImage = $utilFunction->getImagePathByDni($request->num_documento);
      $process = $process->getProcessNumber();

      $data = [
        'postulante' => $applicant,
        'resultadoQr' => $utilFunction->dataQr($applicant->id),
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
