<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Applicant extends Component
{
  public $applicant;
  public $currentStep = 1;
  protected $rules = [
    'applicant.postulante_nombres' => 'required',
    'applicant.postulante_apPaterno' => 'required',
    'applicant.postulante_apMaterno' => 'required',
  ];

  public function render()
  {
    return view('livewire.applicant');
  }
  public function nextStep()
  {
    if ($this->currentStep == 1) {
      $this->validate([
        'applicant.postulante_nombres' => 'required',
      ]);

      $this->currentStep++;
    } elseif ($this->currentStep == 2) {
      $this->validate([
      ]);
    }

/*     $this->currentStep++; */
  }
  public function previousStep()
  {
    $this->currentStep--;
  }
}
