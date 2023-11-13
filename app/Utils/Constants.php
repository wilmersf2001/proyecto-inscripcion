<?php

namespace App\Utils;

class Constants
{
  //RUTAS DE FOTOS
  public const RUTA_FOTO_VALIDA = 'archivos/FotoOk';
  public const RUTA_FOTO_OBSERVADA = 'archivos/Observadas/Fotos';
  public const RUTA_FOTOS_OBSERVADAS = ['fotos-observadas/foto-carnet/', 'fotos-observadas/dni-anverso/', 'fotos-observadas/dni-reverso/'];

  //ESTADOS DE POSTULANTES

  public const ESTADO_OBSERVADO = '2';
  public const ESTADO_VALIDO = '3';
  public const ESTADO_CARNET_IMPRESO = '4';
  public const ESTADO_HUELLA_DIGITAL = '5';
  public const ESTADO_CARNET_ENTREGADO = '6';
  public const ESTADO_ENVIO_OBSERVADO = '7';
  public const ESTADOS_VALIDOS_POSTULANTE = [Constants::ESTADO_VALIDO, Constants::ESTADO_CARNET_IMPRESO, Constants::ESTADO_HUELLA_DIGITAL, Constants::ESTADO_CARNET_ENTREGADO];
  public const ESTADOS_OBSERVADOS_POSTULANTE = [Constants::ESTADO_OBSERVADO, Constants::ESTADO_ENVIO_OBSERVADO];
}
