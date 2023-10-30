<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidatePayment;
use App\Models\Banco;


class PdfConsulta extends Component
{
    public $dni;
    public $voucherNumber;
    public bool $alertpdf = false;

    protected $messages = ValidatePayment::MESSAGES_ERROR;

    protected $rules =[
        'dni' => 'required|numeric|digits:8',
        'voucherNumber' => 'required|numeric|digits:7',
    ];

    public function render()
    {

        if ($this->dni && $this->voucherNumber) {
            $this->bank = Banco::where('dni_dep', $this->dni)
              ->where('NumDoc', $this->voucherNumber)
              ->first();


            if (!$this->bank) {
                $this->alertpdf = true;
            }
          }
        return view('livewire.pdf-consulta');
    }
}
