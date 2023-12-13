<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaParentescos extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tb_categoria_parentescos';

    protected $fillable = [
        'nombre',
    ];
}


