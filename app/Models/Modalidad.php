<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'admision_modalidad';

    protected $primaryKey = 'modalidad_id';

    protected $fillable = [
        'modalidad_descripcion',
        'modalidad_montonacional',
        'modalidad_montoparticular',
        'modalidad_estado',
        'examen_id',
    ];
}
