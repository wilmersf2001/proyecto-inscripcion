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
    protected function uploadIfFileExists($file, string $name, string $destination)
    {
        if ($file) {
            $filename = $name . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($destination . $filename, file_get_contents($file));
        }
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
            return redirect()->route('ficha.startPdfQuery')->with('error', 'Postulante no encontrado o datos ingresados incorrectamente');
        }

        if ($applicant->estado_postulante_id == 7) {
            return redirect()->route('ficha.startPdfQuery')->with('error', 'Tus fotos ya han sido rectificadas, por favor vuelva a intentarlo más tarde');
        }

        if ($applicant->estadoObservadoFichaInscripcion()) {
            $observedPhotos = UtilFunction::getPhotosObservedByDni($applicant->num_documento);
            if (!$observedPhotos) return redirect()->route('ficha.startPdfQuery');
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
            return redirect()->route('ficha.startPdfQuery')->with('error', 'Ficha de inscripción se encuentra en proceso de validación, por favor vuelva a intentarlo más tarde');
        }

        return PDF::loadView('pdf-ficha-inscripcion', $data)->stream();
    }

    public function storeRectifiedPhotos(StoreRectifierPhotoRequest $request)
    {
        $applicant = Postulante::find($request->applicant_id);
        $applicant->update([
            'estado_postulante_id' => 7,
        ]);

        $this->uploadIfFileExists($request->file('photo_perfil'), $applicant->num_documento, Constants::RUTA_FOTO_CARNET_RECTIFICADO);
        $this->uploadIfFileExists($request->file('photo_anverso'), 'A-' . $applicant->num_documento, Constants::RUTA_DNI_ANVERSO_RECTIFICADO);
        $this->uploadIfFileExists($request->file('photo_reverso'), 'R-' . $applicant->num_documento, Constants::RUTA_DNI_REVERSO_RECTIFICADO);

        return redirect()->route('ficha.startPdfQuery')->with('success', 'Tus fotos han sido rectificadas y enviadas correctamente, por favor vuelva a intentarlo más tarde');
    }
}
