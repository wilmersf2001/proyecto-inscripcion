<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRectifierPhotoRequest;
use App\Http\Requests\ValidatePdfRequest;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Utils\UtilFunction;
use App\Models\Postulante;
use App\Models\Proceso;
use App\Utils\Constants;

class FichaInscripcionController extends Controller
{
    private function uploadImage($file, string $name, string $destination)
    {
        $filename = $name . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put($destination . $filename, file_get_contents($file));
    }

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
            return redirect()->route('pdf.startPdfQuery')->with('error', 'Postulante no encontrado o datos ingresados incorrectamente');
        }

        if ($applicant->estadoObservadoFichaInscripcion()) {
            $observedPhotos = UtilFunction::getPhotosObservedByDni($applicant->num_documento);
            return view('rectifier-photo-applicant', compact('applicant', 'observedPhotos'));
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
            return redirect()->route('pdf.startPdfQuery')->with('error', 'Ficha de inscripción en proceso de validación, por favor vuelva a intentarlo más tarde');
        }

        return PDF::loadView('pdf-ficha-inscripcion', $data)->stream();
    }

    public function storeRectifiedPhotos(StoreRectifierPhotoRequest $request)
    {
        $applicant = Postulante::find($request->applicant_id);
        if ($request->hasFile('photo_perfil')) {
            $image = $request->file('photo_perfil');
            $fileName = $applicant->num_documento;
            $this->uploadImage($image, $fileName, Constants::RUTA_FOTO_CARNET_RECTIFICADO);
        }
        if ($request->hasFile('photo_anverso')) {
            $image = $request->file('photo_anverso');
            $fileName = 'A-' . $applicant->num_documento;
            $this->uploadImage($image, $fileName, Constants::RUTA_DNI_ANVERSO_RECTIFICADO);
        }
        if ($request->hasFile('photo_reverso')) {
            $image = $request->file('photo_reverso');
            $fileName = 'R-' . $applicant->num_documento;
            $this->uploadImage($image, $fileName, Constants::RUTA_DNI_REVERSO_RECTIFICADO);
        }
    }
}
