<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use HasFactory;
    protected $table = 'tb_banco';

    protected $fillable = [
        'num_oficina',
        'cod_concepto',
        'tipo_documento',
        'num_documento',
        'importe',
        'fecha',
        'hora',
        'estado',
        'dni_depositante',
        'observacion_depositante',
        'recibo_depositante',
        'fecharecibo_depositante',
        'monto_depositante',
        'descripcion_depositante',
    ];
}
