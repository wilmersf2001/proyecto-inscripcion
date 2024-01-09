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
        'dni_postulante',

    ];
    public function categoria()
{
    return $this->belongsTo(Consanguinidad1::class, 'datos_categoria_id');
}

public function banco()
    {
        return $this->belongsTo(Banco::class, 'dni_postulante', 'num_doc_depo');
    }
}




