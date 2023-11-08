<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Models\Banco;
use App\Models\Modalidad;

class Pay extends Component
{
  public $bank;
  public $numDocument = '';
  public $voucherNumber = '';
  public $agencyNumber = '';
  public $modalities;
  public $payDay;
  public $amount;
  public $modalityId;
  public $typeSchoolId;

  protected $messages = ValidatePayment::MESSAGES_ERROR;

  protected $rules = [
    'numDocument' => 'required|numeric|regex:/^\d{8,9}$/',
    'voucherNumber' => 'required|numeric|digits:7',
    'agencyNumber' => 'required|numeric|digits:4',
    'payDay' => 'required|date',
    'modalityId' => 'required|numeric',
    'typeSchoolId' => 'required|numeric',
  ];

  public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }

  public function mount()
  {
    $this->modalities = Modalidad::where('estado', 1)->get();
  }

  public function render()
  {
    if ($this->numDocument && $this->voucherNumber && $this->agencyNumber && $this->payDay) {
      $this->bank = Banco::where('num_doc_depo', $this->numDocument)
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
