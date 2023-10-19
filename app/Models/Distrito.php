<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'admision_distrito';

    protected $primaryKey = 'distrito_id';

    protected $fillable = [
        'distrito_descripcion',
        'provincia_id',
        'distrito_ubigeo'
    ];
}
