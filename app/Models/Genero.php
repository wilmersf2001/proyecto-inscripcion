<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'admision_sexo';

    protected $primaryKey = 'sexo_id';

    protected $fillable = [
        'sexo_descripcion',
    ];
}
