<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Models\Banco;


class Pay extends Component
{
  public $bank;
  public string $dni = '';
  public string $voucherNumber = '';
  public string $agencyNumber = '';
  public $payDay;
  public float $amount;


  protected $messages = ValidatePayment::MESSAGES_ERROR;

  protected $rules = [
    'dni' => 'required|numeric|digits:8',
    'voucherNumber' => 'required|numeric|digits:7',
    'agencyNumber' => 'required|numeric|digits:4',
    'payDay' => 'required|date',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function render()
  {
    if ($this->dni && $this->voucherNumber && $this->agencyNumber && $this->payDay) {
      $this->bank = Banco::where('dni_dep', $this->dni)
        ->where('NumDoc', $this->voucherNumber)
        ->where('Oficina', $this->agencyNumber)
        ->where('Fecha', $this->payDay)
        ->first();
      if ($this->bank) {
        $this->amount = $this->bank->Importe;
      } else {
        $this->amount = 0;
        session()->flash('warning');
      }
    }
    return view('livewire.pay');
  }
}
