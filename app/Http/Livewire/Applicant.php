<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Applicant extends Component
{
    public $responseApiReniec;
    public function render()
    {
        return view('livewire.applicant');
    }
}
