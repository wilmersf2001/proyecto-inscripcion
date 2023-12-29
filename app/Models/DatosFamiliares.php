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
        'datos_postulante_id',

    ];
    public function IdPostulante(){
        return $this->belongsTo(Postulante::class, 'datos_postulante_id');
    }
}




