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

    public $familiarIndex;
    public $nuevoNombre;

    public $dniFamiliar;
    public $nombresFamiliar;
    public $apPaternoFamiliar;
    public $apMaternoFamiliar;
    public $familiares = [];
    public $categoria_parentescos;
    public $categoria;
    public $subcategoria;
    public $subcategorias = [];

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
        $this->familiar = DatosFamiliares::create([
            'dni_familiar' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'apellidos' => $this->apPaternoFamiliar . ' ' . $this->apMaternoFamiliar,
            'datos_categoria_id' => $this->categoria,
            'parentesco' => Consanguinidad1::find($this->subcategoria)->parentesco,

        ]);
        $this->familiares[] = [

            'id' => $this->familiar->id,
            'dni' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'ap_paterno' => $this->apPaternoFamiliar,
            'ap_materno' => $this->apMaternoFamiliar,
            'categoria' => $nombreCategoria,
            'parentesco' => Consanguinidad1::find($this->subcategoria)->parentesco,
        ];

        $this->resetForm();
    }


    public function editarFamiliar($index)
    {
        $this->familiarIndex = $index;
        $this->nuevoNombre = $this->familiares[$index]['nombres'];
        $this->nuevodni = $this->familiares[$index]['dni'];
        $this->nuevoApellidos = $this->familiares[$index]['ap_paterno'] . ' ' . $this->familiares[$index]['ap_materno'];
        $this->nuevaCategoria = $this->familiares[$index]['categoria'];
        $this->parentescosCategoria = Consanguinidad1::where('categoria_parentesco_id', $this->nuevaCategoria)->get();
        $this->nuevoParentesco = $this->familiares[$index]['parentesco'];
    }
    



    public function guardarFamiliar($index)
    {

        $this->familiares[$index]['nombres'] = $this->nuevoNombre;
        $this->familiares[$index]['dni'] = $this->nuevodni;
        $apellidosSeparados = explode(' ', $this->nuevoApellidos);
        $this->familiares[$index]['ap_paterno'] = $apellidosSeparados[0];
        $this->familiares[$index]['ap_materno'] = $apellidosSeparados[1] ?? '';
        $this->familiares[$index]['categoria'] = $this->nuevaCategoria;
      
        $this->familiares[$index]['parentesco'] = $this->nuevoParentesco;


        $familiar = DatosFamiliares::find($this->familiares[$index]['id']);
        $familiar->nombres = $this->nuevoNombre;
        $familiar->dni_familiar = $this->nuevodni;
        $familiar->apellidos = $this->nuevoApellidos;
        $familiar->datos_categoria_id = $this->nuevaCategoria;
     
        $familiar->save();
        $this->resetForm();

        $this->familiarIndex = null;
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->categoria = null;
        $this->subcategoria = null;
        $this->dniFamiliar = null;
        $this->nombresFamiliar = null;
        $this->apPaternoFamiliar = null;
        $this->apMaternoFamiliar = null;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.consanguinidad');
    }
}










