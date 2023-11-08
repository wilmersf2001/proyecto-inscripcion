<?php

namespace App\Http\Livewire;

use App\Models\Postulante;
use Livewire\Component;

class RectifierPhotoApplicant extends Component
{
    public $applicant;
    public $profilePhoto;
    public $frontDniPhoto;
    public $reverseDniPhoto;

    protected $messages = [
        'profilePhoto.required' => 'La foto de perfil es requerida',
        'profilePhoto.mimes' => 'La foto de perfil debe ser formato jpeg',
        'profilePhoto.max' => 'La foto de perfil debe pesar menos de 1MB',
        'reverseDniPhoto.required' => 'La foto del reverso del DNI es requerida',
        'reverseDniPhoto.mimes' => 'La foto del reverso del DNI debe ser formato jpeg',
        'reverseDniPhoto.max' => 'La foto del reverso del DNI debe pesar menos de 1MB',
        'frontDniPhoto.required' => 'La foto del anverso del DNI es requerida',
        'frontDniPhoto.mimes' => 'La foto del anverso del DNI debe ser formato jpeg',
        'frontDniPhoto.max' => 'La foto del anverso del DNI debe pesar menos de 1MB',
    ];

    protected $rules = [
        'profilePhoto' => 'required|mimes:jpeg|max:1024',
        'reverseDniPhoto' => 'required|mimes:jpeg|max:1024',
        'frontDniPhoto' => 'required|mimes:jpeg|max:1024',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Postulante $applicant)
    {
        $this->applicant = $applicant;
    }
    public function render()
    {
        return view('livewire.rectifier-photo-applicant');
    }
}
