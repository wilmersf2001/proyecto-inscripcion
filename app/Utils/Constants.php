<?php

namespace App\Utils;

class Constants
{
  //RUTAS DE FOTOS
  public const RUTA_FOTO_QR = 'temp/';
  public const RUTA_FOTO_CARNET_VALIDA = 'archivos-validos/foto-carnet/';
  public const RUTA_DNI_ANVERSO_VALIDA = 'archivos-validos/dni-anverso/';
  public const RUTA_DNI_REVERSO_VALIDA = 'archivos-validos/dni-reverso/';
  public const RUTA_FOTO_CARNET_INSCRIPTO = 'archivos-inscripcion/foto-carnet/';
  public const RUTA_DNI_ANVERSO_INSCRIPTO = 'archivos-inscripcion/dni-anverso/';
  public const RUTA_DNI_REVERSO_INSCRIPTO = 'archivos-inscripcion/dni-reverso/';
  public const RUTA_FOTO_CARNET_OBSERVADO = 'archivos-observados/foto-carnet/';
  public const RUTA_DNI_ANVERSO_OBSERVADO = 'archivos-observados/dni-anverso/';
  public const RUTA_DNI_REVERSO_OBSERVADO = 'archivos-observados/dni-reverso/';
  public const RUTA_FOTO_CARNET_RECTIFICADO = 'archivos-rectificados/foto-carnet/';
  public const RUTA_DNI_ANVERSO_RECTIFICADO = 'archivos-rectificados/dni-anverso/';
  public const RUTA_DNI_REVERSO_RECTIFICADO = 'archivos-rectificados/dni-reverso/';
  public const RUTA_FOTOS_VALIDAS = [Constants::RUTA_FOTO_CARNET_VALIDA, Constants::RUTA_DNI_ANVERSO_VALIDA, Constants::RUTA_DNI_REVERSO_VALIDA];
  public const RUTA_FOTOS_OBSERVADAS = [Constants::RUTA_FOTO_CARNET_OBSERVADO, Constants::RUTA_DNI_ANVERSO_OBSERVADO, Constants::RUTA_DNI_REVERSO_OBSERVADO];

  //ESTADOS DE POSTULANTES
  public const ESTADO_INSCRITO = '1';
  public const ESTADO_OBSERVADO = '2';
  public const ESTADO_ENVIO_OBSERVADO = '3';
  public const ESTADO_VALIDO = '4';
  public const ESTADO_CARNET_IMPRESO_PENDIENTE = '5';
  public const ESTADO_HUELLA_DIGITAL = '6';
  public const ESTADO_CARNET_ENTREGADO = '7';
  public const ESTADO_INSCRIPCION_ANULADA = '8';

  public const ESTADOS_VALIDOS_POSTULANTE = [Constants::ESTADO_VALIDO, Constants::ESTADO_CARNET_IMPRESO_PENDIENTE];
  public const ESTADOS_OBSERVADOS_POSTULANTE = [Constants::ESTADO_OBSERVADO, Constants::ESTADO_ENVIO_OBSERVADO];

  // DISCO DE STORAGE
  public const DISK_STORAGE = 'public';

  //EXTRANGERO
  public const DISTRITO_OTROS_ID = 1868;
}
