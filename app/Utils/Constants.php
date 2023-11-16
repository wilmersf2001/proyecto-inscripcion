<?php

namespace App\Utils;

class Constants
{
  //RUTAS DE FOTOS
  public const RUTA_FOTO_QR = 'temp/';
  public const RUTA_FOTO_CARNET_VALIDA = 'fotos-validas/foto-carnet/';
  public const RUTA_DNI_ANVERSO_VALIDA = 'fotos-validas/dni-anverso/';
  public const RUTA_DNI_REVERSO_VALIDA = 'fotos-validas/dni-reverso/';
  public const RUTA_FOTO_CARNET_INSCRIPTO = 'fotos-inscripcion/foto-carnet/';
  public const RUTA_DNI_ANVERSO_INSCRIPTO = 'fotos-inscripcion/dni-anverso/';
  public const RUTA_DNI_REVERSO_INSCRIPTO = 'fotos-inscripcion/dni-reverso/';
  public const RUTA_FOTO_CARNET_OBSERVADO = 'fotos-observadas/foto-carnet/';
  public const RUTA_DNI_ANVERSO_OBSERVADO = 'fotos-observadas/dni-anverso/';
  public const RUTA_DNI_REVERSO_OBSERVADO = 'fotos-observadas/dni-reverso/';
  public const RUTA_FOTO_CARNET_RECTIFICADO = 'fotos-rectificadas/foto-carnet/';
  public const RUTA_DNI_ANVERSO_RECTIFICADO = 'fotos-rectificadas/dni-anverso/';
  public const RUTA_DNI_REVERSO_RECTIFICADO = 'fotos-rectificadas/dni-reverso/';
  public const RUTA_FOTOS_VALIDAS = [Constants::RUTA_FOTO_CARNET_VALIDA, Constants::RUTA_DNI_ANVERSO_VALIDA, Constants::RUTA_DNI_REVERSO_VALIDA];
  public const RUTA_FOTOS_OBSERVADAS = [Constants::RUTA_FOTO_CARNET_OBSERVADO, Constants::RUTA_DNI_ANVERSO_OBSERVADO, Constants::RUTA_DNI_REVERSO_OBSERVADO];

  //ESTADOS DE POSTULANTES
  public const ESTADO_INSCRITO = '1';
  public const ESTADO_OBSERVADO = '2';
  public const ESTADO_ENVIO_OBSERVADO = '3';
  public const ESTADO_VALIDO = '4';
  public const ESTADO_CARNET_IMPRESO_PENDIENTE = '5';
  public const ESTADO_CARNET_ENTREGADO = '6';
  public const ESTADO_INSCRIPCION_ANULADA = '7';

  public const ESTADOS_VALIDOS_POSTULANTE = [Constants::ESTADO_VALIDO, Constants::ESTADO_CARNET_IMPRESO_PENDIENTE];
  public const ESTADOS_OBSERVADOS_POSTULANTE = [Constants::ESTADO_OBSERVADO, Constants::ESTADO_ENVIO_OBSERVADO];

  // DISCO DE STORAGE
  public const DISK_STORAGE = 'public';
}
