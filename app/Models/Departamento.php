<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'tb_departamento';

    protected $fillable = [
        'nombre',
        'ubigeo'
    ];

    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'departamento_id');
    }
}
