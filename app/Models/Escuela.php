<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $table = "admision_escuela";

    protected $primaryKey = "escuela_id";

    protected $fillable = [
        'escuela_codigo',
        'escuela_descripcion',
        'escuela_grupo',
        'escuela_facultad_id',
        'escuela_escuela_id',
        'escuela_codigo_especialidad',
        'escuela_sede',
        'escuela_especialidad',
        'escuela_estado',
    ];
}
