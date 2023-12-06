<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Requests\View\Message\ValidateApplicant;

class Consanguinidad extends Component {
    public $showModal = false;
    public $categoria;
    public $dniFamiliar;
    public $nombresFamiliar;
    public $apPaternoFamiliar;
    public $apMaternoFamiliar;
    public $familiares = [];
    protected $rules = [
        'categoria' => 'required',
        'nombresFamiliar' => 'required',
        'apPaternoFamiliar' => 'required',
        'apMaternoFamiliar' => 'required',
    ];

    protected $messages = ValidateApplicant::MESSAGES_ERROR;

    public function toggleModal() {
        $this->showModal = !$this->showModal;
        $this->resetForm();
    }

    public function resetForm() {
        $this->categoria = null;
        $this->dniFamiliar = null;
        $this->nombresFamiliar = null;
        $this->apPaternoFamiliar = null;
        $this->apMaternoFamiliar = null;
        $this->resetValidation();
    }

    public function agregarFamiliar() {
        if($this->categoria == '2° Grado de Consanguinidad' || $this->categoria == '3° Grado de Consanguinidad' || $this->categoria == '4° Grado de Consanguinidad') {
            $this->rules['dniFamiliar'] = '';
        } else {
            $this->rules['dniFamiliar'] = 'required|max:8';
        }
        $this->validate($this->rules);
        $familiar = [
            'nombres' => $this->nombresFamiliar,
            'ap_paterno' => $this->apPaternoFamiliar,
            'ap_materno' => $this->apMaternoFamiliar,
            'categoria' => $this->categoria,
            'dni' => ($this->categoria != '2° Grado de Consanguinidad' && $this->categoria != '3° Grado de Consanguinidad' && $this->categoria != '4° Grado de Consanguinidad') ? $this->dniFamiliar : null,
        ];

        $this->familiares[] = $familiar;
        $this->resetForm();
    }

    public function render() {
        return view('livewire.consanguinidad');
    }
}

