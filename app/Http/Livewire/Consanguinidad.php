<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\ApiReniecService;
use App\Http\Requests\View\StoreApplicantRequest;
use App\Http\Requests\View\Message\ValidateApplicant;

class Consanguinidad extends Component
{
    public $showModal = false;
    public $consanguinidad = [
        'num_documento_familiar' => null,
        'nombres_familiar' => null,
        'ap_paterno_familiar' => null,
        'ap_materno_familiar' => null,
    ];
    protected $messages = ValidateApplicant::MESSAGES_ERROR;
    protected $rules = [
        'consanguinidad.num_documento_familiar' => 'required',
    ];


    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function getFamiliarDataByDni(ApiReniecService $apiReniecService)
    {
        $this->validate(); // Validate all rules

        $familiar = $apiReniecService->getFamiliarDataByDni($this->consanguinidad['num_documento_familiar']);

        if (count($familiar) > 0) {
            $this->consanguinidad['nombres_familiar'] = $familiar['nombres'];
            $this->consanguinidad['ap_paterno_familiar'] = $familiar['apellidoPaterno'];
            $this->consanguinidad['ap_materno_familiar'] = $familiar['apellidoMaterno'];
            $this->consanguinidad['num_documento_familiar'] = $familiar['dni'];
        } else {
            $this->resetDataFamiliar();
        }
    }

    private function resetDataFamiliar()
    {
        $this->consanguinidad['nombres_familiar'] = null;
        $this->consanguinidad['ap_paterno_familiar'] = null;
        $this->consanguinidad['ap_materno_familiar'] = null;
    }

    public function datosConsanguinidad()
    {
        return view('consanguinidad.datosConsanguinidad');
    }

    public function render()
    {
        return view('livewire.consanguinidad');
    }
}
