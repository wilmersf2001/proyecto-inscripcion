<?php

namespace App\Http\Livewire;

use App\Models\Consanguinidad1;
use App\Models\DatosFamiliares;
use App\Models\Postulante;
use Livewire\Component;
use App\Http\Requests\View\Message\ValidateApplicant;



class Consanguinidad extends Component
{
    public Postulante $applicant;
    public $postulante_dni;
    public $showModal = false;
    public $dniFamiliar;
    public $nombresFamiliar;
    public $apPaternoFamiliar;
    public $apMaternoFamiliar;
    public $familiares = [];
    public $categoria_parentescos;
    public $categoria;
    public $subcategoria;
    public $subcategorias = [];
    public $editIndex = null;
    public $modoEdicion = false;
    public $errorMensaje = '';
    public $mostrarSeccion = true;


    protected $messages = ValidateApplicant::MESSAGES_ERROR;

    public function mount(Postulante $applicant, int $postulante_dni)
    {

        $this->applicant = $applicant;
        $this->postulante_dni = $postulante_dni;

        $this->subcategorias = Consanguinidad1::all();

    }

    public function actualizarCategorias()
    {
        if ($this->subcategoria) {
            $categoria = Consanguinidad1::where('parentesco', $this->subcategoria)->first();
            $this->categoria = $categoria ? $categoria->categoria_nombre : null;
        } else {
            $this->categoria = [];
        }
    }
    public function actualizarSubcategorias()
    {
        if ($this->categoria) {
            $this->subcategorias = Consanguinidad1::where('categoria_parentesco_id', $this->categoria)->get();
        } else {
            $this->subcategorias = [];
        }
    }
    private function dniExistsInTable($dni)
    {
        foreach ($this->familiares as $familiar) {
            if ($familiar['dni'] == $dni) {
                return true;
            }
        }
        return false;
    }
    public function agregarFamiliar()
    {
        $dni = $this->dniFamiliar;
        $rules = [
            'nombresFamiliar' => 'required',
            'apPaternoFamiliar' => 'required',
            'apMaternoFamiliar' => 'required',
            'categoria' => 'required',
            'subcategoria' => 'required',
            'dniFamiliar' => $this->categoria == 3 || $this->categoria == 4 ? 'nullable|numeric|digits:8' : 'required|numeric|digits:8',
        ];
        if ($this->dniExistsInTable($dni)) {
            $this->addError('dniFamiliar', 'El DNI ya existe en la tabla.'); // Add error message
            return;
        }
        if (intval($this->categoria) === 3 || intval($this->categoria) === 4) {
            $rules['dniFamiliar'] = 'nullable|numeric|digits:8';
        } else {
            $rules['dniFamiliar'] = 'required|numeric|digits:8';
        }
        $this->validate($rules);

        $nuevoFamiliar = [
            'dni' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'ap_paterno' => $this->apPaternoFamiliar,
            'ap_materno' => $this->apMaternoFamiliar,
            'categoria' => $this->categoria,
            'parentesco' => $this->subcategoria,
        ];

        if ($this->editIndex !== null) {

            $this->familiares[$this->editIndex] = $nuevoFamiliar;
            $this->editIndex = null;
        } else {
            $this->familiares[] = $nuevoFamiliar;
        }
        $this->resetForm();

        $this->errorMensaje = 'dni duplicado';
    }
    public function editarFamiliar($index)
    {
        $familiar = $this->familiares[$index];
        $this->editIndex = $index;
        $this->dniFamiliar = $familiar['dni'];
        $this->nombresFamiliar = $familiar['nombres'];
        $this->apPaternoFamiliar = $familiar['ap_paterno'];
        $this->apMaternoFamiliar = $familiar['ap_materno'];
        $this->categoria = $familiar['categoria'];
        $this->subcategoria = $familiar['parentesco'];

        $this->modoEdicion = true;
    }
    public function finalizar()
    {
       
      
            foreach ($this->familiares as $familiar) {
                $categoria = Consanguinidad1::where('parentesco', $familiar['parentesco'])->first();
                if ($categoria) {
                    DatosFamiliares::create([
                        'dni_familiar' => $familiar['dni'],
                        'nombres' => $familiar['nombres'],
                        'apellidos' => $familiar['ap_paterno'] . ' ' . $familiar['ap_materno'],
                        'datos_categoria_id' => $categoria->id,
                        'dni_postulante' => $this->postulante_dni,
                    ]);
                }
        }
        $this->familiares = [];
        $this->resetForm();
        $this->showModal = false;
        $this->mostrarSeccion = false;
        $this->mostrarBotonFinalizar = true;
    }



    public function OcultarSeccion()
    {
        $this->mostrarSeccion = false;
    }
    public function resetForm()
    {
        $this->dniFamiliar = '';
        $this->nombresFamiliar = '';
        $this->apPaternoFamiliar = '';
        $this->apMaternoFamiliar = '';
        $this->categoria = '';
        $this->subcategoria = '';

        $this->modoEdicion = false;
    }
    public function render()
    {
        return view('livewire.consanguinidad');
    }
}
