<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    protected $table = 'admision_banco';
    protected $primaryKey = 'NumSecuencia';

    protected $fillable = [
        'Oficina',
        'Concepto',
        'TipoDoc',
        'NumDoc',
        'Importe',
        'Fecha',
        'Hora',
        'Estado',
        'dni_dep',
        'observacion_dep',
        'recibo_dep',
        'fecharecibo_dep',
        'monto_dep',
        'descripcion_dep',
    ];
}
