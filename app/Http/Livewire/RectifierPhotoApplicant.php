<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Postulante;
use Livewire\Component;

class RectifierPhotoApplicant extends Component
{
    use WithFileUploads;

    public $applicant;
    public $photo = [];
    public $observedPhotos;
    public $numberObserved;
    public $disabled = true;
    public $numberPhotos;

    protected function rules()
    {
        $rules = [];
        foreach ($this->observedPhotos as $photo) {
            $rules["photo.{$photo['name']}"] = 'required|mimes:jpeg|max:1024';
        }
        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Postulante $applicant, array $observedPhotos)
    {
        $this->observedPhotos = $observedPhotos;
        $this->applicant = $applicant;
        $this->numberPhotos = count($observedPhotos);
    }
    public function render()
    {
        return view('livewire.rectifier-photo-applicant');
    }
    public function store()
    {
        $this->disabled = false;
        $this->validate();
    }
}
