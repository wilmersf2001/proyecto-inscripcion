<?php

namespace App\Http\Livewire;

use App\Models\CategoriaParentescos;
use App\Models\Consanguinidad1;
use App\Models\DatosFamiliares;
use Livewire\Component;
use App\Http\Requests\View\Message\ValidateApplicant;

class Consanguinidad extends Component
{
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

    protected $messages = ValidateApplicant::MESSAGES_ERROR;

    public function mount()
    {
        $this->categoria_parentescos = CategoriaParentescos::all();
        $this->subcategorias = Consanguinidad1::all();
    }

    public function actualizarSubcategorias()
    {
        if ($this->categoria) {
            $this->subcategorias = Consanguinidad1::where('categoria_parentesco_id', $this->categoria)->get();
        } else {
            $this->subcategorias = [];
        }
    }

    public function agregarFamiliar()
    {
        $rules = [
            'nombresFamiliar' => 'required',
            'apPaternoFamiliar' => 'required',
            'apMaternoFamiliar' => 'required',
            'categoria' => 'required',
            'subcategoria' => 'required',
        ];

        if (!in_array($this->categoria, [2, 3, 4])) {
            $rules['dniFamiliar'] = 'required|numeric|digits:8';
        }

        $this->validate($rules);

        $nombreCategoria = CategoriaParentescos::find($this->categoria)->nombre;
        $nombreParentesco = Consanguinidad1::find($this->subcategoria)->parentesco;

        $nuevoFamiliar = [
            'dni' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'ap_paterno' => $this->apPaternoFamiliar,
            'ap_materno' => $this->apMaternoFamiliar,
            'categoria' => $nombreCategoria,
            'subcategoria' => $nombreParentesco,
        ];

        if ($this->editIndex !== null) {

            $this->familiares[$this->editIndex] = $nuevoFamiliar;
            $this->editIndex = null;
        } else {
            $this->familiares[] = $nuevoFamiliar;
        }

        $this->resetForm();
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
        $this->subcategoria = $familiar['subcategoria'];


        $categoriaModel = CategoriaParentescos::where('nombre', $this->categoria)->first();
        $this->categoria = $categoriaModel ? $categoriaModel->id : null;
        $subcategoriaModel = Consanguinidad1::where('parentesco', $this->subcategoria)->first();
        $this->subcategoria = $subcategoriaModel ? $subcategoriaModel->id : null;

        $this->modoEdicion = true;
    }


    public function finalizar()
    {
        try {
            foreach ($this->familiares as $familiar) {
                DatosFamiliares::create([
                    'dni_familiar' => $familiar['dni'],
                    'nombres' => $familiar['nombres'],
                    'apellidos' => $familiar['ap_paterno'] . ' ' . $familiar['ap_materno'],
                    'datos_categoria_id' => $this->getCategoriaId($familiar['categoria']),
                ]);
            }
            $this->familiares = [];
            $this->resetForm();
            $this->showModal = false;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    private function getCategoriaId($nombreCategoria)
    {
        $categoriaModel = CategoriaParentescos::where('nombre', $nombreCategoria)->first();
        return $categoriaModel ? $categoriaModel->id : null;
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


