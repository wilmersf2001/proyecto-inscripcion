<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'admision_provincia';

    protected $primaryKey = 'provincia_id';

    protected $fillable = [
        'provincia_descripcion',
        'UBIGEO_PR',
        'departamento_id'
    ];

    public function distritos()
    {
        return $this->hasMany(Distrito::class, 'provincia_id');
    }
}
