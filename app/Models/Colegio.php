<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;

    protected $table = 'admision_colegio';

    protected $primaryKey = 'colegio_id';

    protected $fillable = [
        'colegio_descripcion',
        'colegio_centropoblado',
        'colegio_distrito',
        'colegio_tipocolegio',
        'departamento_id',
        'colegio_ubigeo'
    ];
}
