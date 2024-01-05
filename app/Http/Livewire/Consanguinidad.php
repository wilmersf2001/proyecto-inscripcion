<?php

namespace App\Http\Livewire;

use App\Models\CategoriaParentescos;
use App\Models\Consanguinidad1;
use App\Models\DatosFamiliares;
use App\Models\Banco;
use App\Models\Postulante;
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
        $this->subcategorias = Consanguinidad1::all();
    }
    public function actualizarCategorias()
    {
        if ($this->subcategoria) {
            $categoria = Consanguinidad1::where('parentesco', $this->subcategoria)->first();
            $this->categoria = $categoria ? $categoria->categoria_nombre : null;
        }
        else{
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
    public function agregarFamiliar()
    {
        $rules = [
            'nombresFamiliar' => 'required',
            'apPaternoFamiliar' => 'required',
            'apMaternoFamiliar' => 'required',
            'categoria' => 'required',
            'subcategoria' => 'required',
            'dniFamiliar' => $this->categoria == 3 || $this->categoria == 4 ? 'nullable|numeric|digits:8' : 'required|numeric|digits:8',
        ];

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
        try {



                foreach ($this->familiares as $familiar) {
                    $banco = Banco::first();
                    if ($banco && $banco->num_doc_depo) {
                    $categoria = Consanguinidad1::where('categoria_nombre', $familiar['categoria'])->first();

                if ($categoria) {
                    DatosFamiliares::create([
                        'dni_familiar' => $familiar['dni'],
                        'nombres' => $familiar['nombres'],
                        'apellidos' => $familiar['ap_paterno'] . ' ' . $familiar['ap_materno'],
                        'datos_categoria_id' => $categoria->id,
                        'dni_postulante' => $banco->num_doc_depo,
                    ]);
                }
                }
            }
            $this->familiares = [];
            $this->resetForm();
            $this->showModal = false;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


   /*  private function getCategoriaId($nombreCategoria)
    {
        $categoriaModel = Consanguinidad1::where('categoria_nombre', $nombreCategoria)->first();
        return $categoriaModel ? $categoriaModel->id : null;
    } */
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


