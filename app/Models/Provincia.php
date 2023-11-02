<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'tb_provincia';

    protected $fillable = [
        'nombre',
        'ubigeo',
        'departamento_id'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function distritos()
    {
        return $this->hasMany(Distrito::class, 'provincia_id');
    }
}
