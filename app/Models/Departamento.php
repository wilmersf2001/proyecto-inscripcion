<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'admision_departamento';

    protected $primaryKey = 'departamento_id';

    protected $fillable = [
        'departamento_descripcion',
        'UBIGEO_DE'
    ];

    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'departamento_id');
    }
}
