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
            'subcategoria' =>'required',
        ];
        if (!in_array($this->categoria, [2, 3, 4])) {
            $rules['dniFamiliar'] = 'required|numeric|digits:8';
        }
        $this->validate($rules);

         /* DatosFamiliares::create([
            'dni_familiar' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'apellidos' => $this->apPaternoFamiliar . ' ' . $this->apMaternoFamiliar,
            'datos_categoria_id' => $this->categoria ?? 1,
        ]);
           $this->familiares = DatosFamiliares::all()->toArray(); */

           $this->familiar = DatosFamiliares::create([
            'dni_familiar' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'apellidos' => $this->apPaternoFamiliar . ' ' . $this->apMaternoFamiliar,
            /* 'datos_categoria_id' => CategoriaParentescos::find($this->categoria)->nombre, */
            'datos_categoria_id' => $this->categoria,
            'parentesco' => Consanguinidad1::find($this->subcategoria)->parentesco,
        ]);

           $this->familiares[] = [
            'dni' => $this->dniFamiliar,
            'nombres' => $this->nombresFamiliar,
            'ap_paterno' => $this->apPaternoFamiliar,
            'ap_materno' => $this->apMaternoFamiliar,
            /* 'categoria' => CategoriaParentescos::find($this->categoria)->nombre, */
            'categoria' => $this->categoria,
            'parentesco' => Consanguinidad1::find($this->subcategoria)->parentesco,
        ];

       /*  $this->familiares[] = $familiar; */
        $this->resetForm();
    }
    public function finalizar()
{
    if (!empty($this->familiares)) {

        foreach ($this->familiares as $familiar) {
           DatosFamiliares::create([
                'dni_familiar' => $familiar['dni'],
                'nombres' => $familiar['nombres'],
                'apellidos' => $this->apPaternoFamiliar . ' ' . $this->apMaternoFamiliar,
                'datos_categoria_id' => $familiar['categoria'],
                'parentesco' => $familiar['parentesco'],
            ]);
        }
        $this->familiares = [];
    }
}


    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->categoria = null;
        $this->subcategoria= null;
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









