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
  protected $messages = ValidatePayment::MESSAGES_ERROR;
  protected $rules = [
    'dni' => 'required|numeric|digits:8|exists:admision_banco,dni_dep',
    'voucherNumber' => 'required|numeric|digits:7|exists:admision_banco,NumDoc',
  ];
  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }
  public function render()
  {
    $this->modalities = Modalidad::get();
    return view('livewire.pay');
  }
}
