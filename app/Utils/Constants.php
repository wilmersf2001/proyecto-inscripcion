<?php

namespace App\Utils;

class Constants
{
  //RUTAS DE FOTOS
  public const RUTA_FOTO_VALIDA = 'archivos/FotoOk';
  public const RUTA_FOTO_OBSERVADA = 'archivos/Observadas/Fotos';

  //ESTADOS DE POSTULANTES
  public const ESTADO_VALIDO = '3';
  public const ESTADO_CARNET_IMPRESO = '4';
  public const ESTADO_HUELLA_DIGITAL = '5';
  public const ESTADO_CARNET_ENTREGADO = '6';
  public const ESTADOS_VALIDOS_POSTULANTE = [Constants::ESTADO_VALIDO, Constants::ESTADO_CARNET_IMPRESO, Constants::ESTADO_HUELLA_DIGITAL, Constants::ESTADO_CARNET_ENTREGADO];
}
