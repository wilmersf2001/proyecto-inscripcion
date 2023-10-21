<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Models\Modalidad;


class Pay extends Component
{
  public string $dni;
  public string $voucherNumber;
  public string $agencyNumber;
  public $payDay;
  public float $amount;
  public int $idModality;
  public int $typeSchool;
  public $modalities;
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

  public function mount(){
    $this->modalities = Modalidad::all();
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
    return view('livewire.pay');
  }
}
