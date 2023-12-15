<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosFamiliares extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'tb_datos_familiares';

    protected $fillable = [
        'dni_familiar',
        'nombres',
        'apellidos',
        'datos_categoria_id',


    ];
   /*  public function CategoriaParentescos(){
        return $this->belongsTo(CategoriaParentescos::class, 'datos_Categoria_id');
    } */
}
