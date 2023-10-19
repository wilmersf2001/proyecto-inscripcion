<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDireccion extends Model
{
    use HasFactory;

    protected $table = 'admision_tipodireccion';

    protected $primaryKey = 'tipodireccion_id';

    protected $fillable = [
        'tipodireccion_descripcion',
    ];
}
