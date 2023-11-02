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
      $this->bank = Banco::where('dni_depositante', $this->dni)
        ->where('num_documento', $this->voucherNumber)
        ->where('num_oficina', $this->agencyNumber)
        ->where('fecha', $this->payDay)
        ->first();

      $this->amount = $this->bank ? $this->bank->importe : 0;
      if (!$this->bank) {
        session()->flash('warning');
      }
    }
    return view('livewire.pay');
  }
}
