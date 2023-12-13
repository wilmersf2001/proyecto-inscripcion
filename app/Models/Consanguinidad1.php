<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consanguinidad1 extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'tb_consanguinidad';

    protected $fillable = [
        'parentesco',
        'categoria_parentesco_id'
    ];

    /* public function subcategorias()
    {
        return $this->hasMany(Consanguinidad::class);
    } */
}
