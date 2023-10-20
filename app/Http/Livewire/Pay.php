<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Models\Modalidad;
use App\Services\ApiSunatService;


class Pay extends Component
{
  public $dni;
  public $voucherNumber;
  public $modalities;
  public $agencia;

  protected $messages = ValidatePayment::MESSAGES_ERROR;
  protected $rules = [
    'dni' => 'required|numeric|digits:8|exists:admision_banco,dni_dep',
    'voucherNumber' => 'required|numeric|digits:7|exists:admision_banco,NumDoc',
    /* 'agencia' => 'required|numeric|digits:4|exists:admision_banco,Oficina', */
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
  public function render()
  {
     /* $this->applicantsExists = Banco::where('dni_dep', $this->dniApplicant)->exists();

    if ($this->applicantsExists) {
         $this->validate([
            'voucherNumber' => 'required|exists:admision_banco,NumDoc,dni_dep,' . $this->dniApplicant,
        ]);
        $this->valiApplicantExists = true;
    } else {
        $this->valiApplicantExists = false;
    } */

     /* $this->validate(); */
    $this->modalities = Modalidad::get();
    return view('livewire.pay');
  }
}
