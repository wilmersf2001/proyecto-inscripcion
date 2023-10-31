<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colegio;
use App\Models\Distrito;
use App\Models\Escuela;
use App\Models\Modalidad;
use App\Models\Postulante;
use App\Models\Proceso;
use App\Models\Sede;
use App\Utils\UtilFunction;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    public function pdfData($dni)
    {
      $process = new Proceso();
      $utilFunction = new UtilFunction();

      $applicant = Postulante::where('postulante_numDocumento', $dni)->first();
      $today = $utilFunction->getDateToday();
      $pathImage = $utilFunction->getImagePathByDni($dni);
      $process = $process->getProcessNumber();

      $data = [
        'postulante' => $applicant,
        'resultadoQr' => $utilFunction->dataQr($applicant->postulante_id),
        'escuela' => Escuela::find($applicant->escuela_id)->escuela_descripcion,
        'modalidad' => Modalidad::find($applicant->modalidad_id)->modalidad_descripcion,
        'sede' => Sede::find($applicant->sede_id)->sede_descripcion,
        'colegio' => Colegio::find($applicant->colegio_id)->colegio_descripcion,
        'distritoNacimiento' => Distrito::find($applicant->distrito_id_direccion)->distrito_descripcion,
        'process' => $process,
        'today' => $today,
        'pathImage' => $pathImage,
        'tipoColegio' => Colegio::find($applicant->colegio_id)->colegio_tipocolegio == 1 ? 'Nacional' : 'Privado'
      ];

      return PDF::loadView('Pdfconsulta.pdfData', $data)->stream();

    }
}
