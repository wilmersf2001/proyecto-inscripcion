<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Models\Modalidad;
Use App\Models\Banco;


class Pay extends Component
{
  public string $dni='';
  public string $voucherNumber='';
  public string $agencyNumber='';
  public $payDay;

   public $matchingPayment;
  public float $amount;


  protected $messages = ValidatePayment::MESSAGES_ERROR;

  protected $rules = [
    'dni' => 'required|numeric|digits:8|exists:admision_banco,dni_dep',
    'voucherNumber' => 'required|numeric|digits:7|exists:admision_banco,NumDoc',
    'agencyNumber' => 'required|numeric|digits:4|exists:admision_banco,Oficina',
    'payDay' => 'required|date|exists:admision_banco,Fecha',

  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function render()
  {
    $this->resetValidation();
    if ($this->dni && $this->voucherNumber && $this->agencyNumber && $this->payDay) {
        $matchingPayment = Banco::where('dni_dep', $this->dni)
            ->where('NumDoc', $this->voucherNumber)
            ->where('Oficina', $this->agencyNumber)
            ->where('Fecha', $this->payDay)
            ->first();
        if ($matchingPayment) {

            $this->amount = $matchingPayment->Importe;
        } else {
            $this->amount = 0;
            session()->flash('warning', 'Error, ingrese sus datos de manera correcta.');
        }

    }
    return view('livewire.pay');
  }
}
