<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FichaInscripcion extends Component
{
    public string $num_documento;
    public string $num_voucher;

    protected $messages = [
        'num_documento.required' => 'El campo DNI es obligatorio.',
        'num_documento.numeric' => 'El campo DNI debe ser numérico.',
        'num_documento.regex' => 'El campo DNI debe tener 8 o 9 dígitos.',
        'num_voucher.required' => 'El campo N° de voucher es obligatorio.',
        'num_voucher.numeric' => 'El campo N° de voucher debe ser numérico.',
        'num_voucher.digits' => 'El campo N° de voucher debe tener 7 dígitos.',
    ];

    protected $rules = [
        'num_documento' => 'required|numeric|regex:/^\d{8,9}$/',
        'num_voucher' => 'required|numeric|digits:7',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.ficha-inscripcion');
    }
}
