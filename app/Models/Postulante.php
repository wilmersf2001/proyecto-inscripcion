<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $table = 'admision_postulante';

    protected $primaryKey = 'postulante_id';

    protected $fillable = [
        'postulante_nombres',
        'postulante_apPaterno',
        'postulante_apMaterno',
        'sexo_id',
        'postulante_fechNac',
        'postulante_numDocumento',
        'postulante_talla',
        'postulante_voucher',
        'postulante_direccion',
        'distrito_id_direccion',
        'tipodireccion_id',
        'postulante_correo',
        'postulante_telefono',
        'postulante_telefonoAp',
        'postulante_anioEgres',
        'postulante_fechInsc',
        'postulante_numvecesu',
        'postulante_numveceso',
        'escuela_id',
        'colegio_id',
        'distrito_id',
        'universidad_id',
        'postulante_codigopostulante',
        'modalidad_id',
        'sede_id',
        'postulante_estado',
        'INGRESO',
    ];

    public function sexo()
    {
        return $this->belongsTo(Genero::class, 'sexo_id');
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }

    public function distritoDireccion()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id_direccion');
    }

    public function tipoDireccion()
    {
        return $this->belongsTo(TipoDireccion::class, 'tipodireccion_id');
    }

    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'colegio_id');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_id');
    }

    public function escuela()
    {
        return $this->belongsTo(Escuela::class, 'escuela_id');
    }

    public static function fromArrayReniec(array $data){
        $postulante = new Postulante();
        $postulante->postulante_nombres = $data['nombres'];
        $postulante->postulante_apPaterno = $data['apellidoPaterno'];
        $postulante->postulante_apMaterno = $data['apellidoMaterno'];
        $postulante->postulante_numDocumento = $data['numeroDocumento'];
        return $postulante;
    }
}
