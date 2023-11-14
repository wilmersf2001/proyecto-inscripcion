<?php

namespace App\Services;

use App\Models\Genero;
use App\Models\Modalidad;
use App\Models\Sede;
use App\Models\TipoDireccion;
use Illuminate\Support\Facades\Cache;

class FormDataService
{
  public function getAdressType()
  {
    return Cache::remember("adressType", 60, function () {
      return TipoDireccion::all();
    });
  }

  public function getGeneros()
  {
    return Cache::remember("generos", 60, function () {
      return Genero::all();
    });
  }

  public function getSedes()
  {
    return Cache::remember("sedes", 60, function () {
      return Sede::getSedesEnabled();
    });
  }

  public function getModalities()
  {
    return Cache::remember("modalities", 60, function () {
      return Modalidad::getModalidadesEnabled();
    });
  }
}
