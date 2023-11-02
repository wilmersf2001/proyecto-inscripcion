<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Banco;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Http\Requests\ValidatePaymentRequest;

class Pdfconsulta extends Component
{
    public $dni;
    public $voucherNumber;
    public $bank;
    public bool $alertpdf=false;

    protected $messages = ValidatePayment::MESSAGES_ERROR;
    protected $rules = [
        'dni' => 'required|numeric|digits:8',
        'voucherNumber' => 'required|numeric|digits:7',
    ];

    public function updated($propertyName)
  {
    $this->validateOnly($propertyName);
  }



    public function render()
    {
        if ($this->dni && $this->voucherNumber) {
            $this->bank = Banco::where('dni_depositante', $this->dni)
                ->where('num_documento', $this->voucherNumber)
                ->first();

            if (!$this->bank) {
                $this->alertpdf = true;

            }else{
                $this->alertpdf = false;
            }

        }
        return view('livewire.Pdfconsulta');
  }

}
