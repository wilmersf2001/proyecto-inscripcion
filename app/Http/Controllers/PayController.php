<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidatePaymentRequest;
use App\Services\ApiSunatDevService;
use App\Models\Banco;
use App\Models\Modalidad;
use App\Models\Postulante;
use App\Models\Proceso;
use App\Services\ApiReniecService;
use App\Utils\Constants;

class PayController extends Controller
{
  protected ApiReniecService $apiReniec;

  public function __construct(ApiReniecService $apiReniec)
  {
    $this->apiReniec = $apiReniec;
  }

  public function __invoke()
  {
    $processNumber = Proceso::getProcessNumber();
    return view('validate-payment', compact('processNumber'));
  }

  public function validatePayment(ValidatePaymentRequest $request, ApiSunatDevService $apiService)
  {
    $numDocument = $request->numDocument;
    $typeSchool = $request->typeSchoolId;

    $bank = Banco::where('num_doc_depo', $request->numDocument)
      ->where('num_documento', $request->voucherNumber)
      ->where('num_oficina', $request->agencyNumber)
      ->where('fecha', $request->payDay)
      ->first();

    if (!$bank) {
      return redirect()->route('start')->with('alert', 'Pago no encontrado, por favor verifique que los datos esten correctamentes ingresados');
    }

    if ($bank->estado == 1) {
      return redirect()->route('start')->with('alert', 'Los datos del voucher ingresados ya fueron registrados');
    }

    $postulante = Postulante::where('num_documento', $numDocument)->first();
    if ($postulante && $postulante->estado_postulante_id != Constants::ESTADO_INSCRIPCION_ANULADA) {
      return redirect()->route('start')->with('alert', 'El postulante ya se encuentra registrado en el proceso de admisión');
    }

    $modality = Modalidad::find($request->modalityId);
    $amount = ($typeSchool == 1) ? $modality->monto_nacional : $modality->monto_particular;
    if ($amount > $bank->importe) {
      return redirect()->route('start')->with('alert', 'El monto del voucher no es suficiente para la modalidad seleccionada');
    }

    /* $applicant = $this->apiReniec->getApplicantDataByDni($numDocument); */
    $applicant = $apiService->getApplicantDataByDni($numDocument);
    $applicant->modalidad_id = $request->modalityId;
    $applicant->colegio_id = $bank->tipo_doc_depo == 1 ? null : ($typeSchool == 1 ? 15496 : 15497);

    return view('register-applicant', compact('applicant', 'bank', 'typeSchool'));
  }
}
