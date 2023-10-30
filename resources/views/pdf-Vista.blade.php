<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Postulante {{ $postulante->postulante_numDocumento }}</title>
  <style>
    .table-container {
      width: 100%;
      border: 1px solid black;
      border-collapse: collapse;
      box-sizing: border-box;
    }

    .table-item1 {
      width: 20%;
      padding: 20px;
    }

    .table-item2 {
      width: 60%;
      padding: 20px;
    }

    .table-item3 {
      width: 20%;
      border-left: 1px solid black;
    }

    h4 {
      text-align: center;
    }

    .subtitulo {
      text-align: center;
      line-height: 1.5;
    }

    .table-header {
      background-color: #9e9e9e;
      color: black;
      font-size: 14px;
      text-align: center;
      font-weight: bold;
      padding: 5px;
      border: 1px solid black;
    }

    .column-p {
      display: inline-block;
      width: 43%;
      height: 5px;
    }

    .table-header-juramento {
      background-color: #9e9e9e;
      color: black;
      font-size: 15.2px;
      text-align: center;
      font-weight: bold;
      padding: 5px;
      border: 1px solid black;
    }

    .table-header-info {
      padding: 0 10px;
      margin: 0;
      font-size: 13px;
    }

    .table-header-info-juramento {
      font-size: 14px;
      border-right: 1px solid black;
    }

    .codigo-qr {
      width: 30%;
      height: 10%;
      padding: 20px;

    }

    ul {
      padding: 0 20px;

    }

    hr {
      margin-top: 40px;
      width: 220px
    }

    .codigo-qr {
      border: 1px solid black;
    }

    .huella {
      position: relative;
      width: 100px;
      height: 120px;
      font-size: 10px;
      margin: 15px auto;
      border: 1px solid black;
    }

    .huella p {
      border-top: 1px solid black;
      position: absolute;
      bottom: 0;
      left: 0;
      margin: 0;
      padding: 0;
      padding: 5px 8px;
    }
  </style>
</head>

<body>
  <table class="table-container">
    <tr>
      <td class="table-item1">
        <img src={{ public_path('imgs/logo_ficha.png') }} alt="logo_unprg" width="95" height="120">
      </td>
      <td class="table-item2">
        <h4>UNIVERSIDAD NACIONAL PEDRO RUIZ GALLO DIRECCIÓN DE ADMISIÓN</h4>
        <div class="subtitulo">EXAMEN DE ADMISIÓN {{ $process }} <br> CONSTANCIA DE INSCRIPCIÓN DEL POSTULANTE
        </div>
      </td>
      <td class="table-item3">
        <center>
          @if ($pathImage)
            <img src={{ $pathImage }} alt="postulante" width="115" height="155">
          @endif
        </center>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header">DATOS POSTULANTE</td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p class="column-p"><b>DNI:</b> {{ $postulante->postulante_numDocumento }}</p>
        <p class="column-p"><b>N° Voucher:</b> {{ $postulante->postulante_voucher }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p><b>Apellidos y Nombres:</b> {{ $postulante->postulante_nombres }} {{ $postulante->postulante_apPaterno }}
          {{ $postulante->postulante_apMaterno }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p><b>Dirección:</b> {{ $postulante->postulante_direccion }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p class="column-p"><b>Teléfono postulante:</b> {{ $postulante->postulante_telefono }}</p>
        <p class="column-p"><b>Teléfono apoderado: </b>{{ $postulante->postulante_telefonoAp }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p><b>Fecha y lugar de nacimiento:</b> {{ $postulante->postulante_fechNac }} | {{ $distritoNacimiento }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p><b>Correo:</b> {{ $postulante->postulante_correo }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p><b>Colegio:</b> {{ $colegio }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p class="column-p"><b>Tipo colegio:</b> {{ $tipoColegio }}</p>
        <p class="column-p"><b>Año egreso:</b> {{ $postulante->postulante_anioEgres }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header">DATOS POSTULACIÓN</td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p><b>Programa académico:</b> {{ $escuela }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p class="column-p"><b>Modalidad:</b> {{ $modalidad }}</p>
        <p class="column-p"><b>Sede:</b> {{ $sede }}</p>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-juramento">DECLARO BAJO JURAMENTO QUE:</td>
    </tr>
    <tr>
      <td colspan="2" class="table-header-info-juramento">
        <ul>
          <li>Conozco, acepto y me someto a las bases, condiciones y procedimientos establecidos en el Reglamento del
            Concurso de Admisión {{ $process }}, de la Universidad Nacional Pedro Ruiz Gallo.</li>
          <li>
            La información y fotografia registrada es AUTÉNTICA y que las imágenes de mi DNI enviados para mi
            inscripción como postulante al presente Concurso de Admisión, son copia fiel al original; en caso de faltar
            a la verdad, me someto a las sanciones correspondientes (Art.23 del Reglamento del presente Concurso de
            Admisión).
          </li>
          <li>
            No tengo impedimento para participar en el Concurso de Admisión {{ $process }}.
          </li>
          <li>
            De alcanzar una vacante, me comprometo a regularizar mi expediente en la fecha establecida en el cronograma
            del presente Concurso de Admisión en caso contrario me someto a las sanciones correspondientes (Art.68 del
            Reglamento del presente Concurso de Admisión).
          </li>
          <li>
            He culminado el 5to año de Educación Secundaria antes del Concurso de Admisión {{ $process }}.
          </li>
        </ul>
      </td>
      <td colspan="1">
        <center style="margin-top: 20px">
          <img
            src="data:image/png;charset=utf-8;base64,{{ base64_encode(QrCode::encoding('UTF-8')->generate($resultadoQr)) }}"
            alt="Código QR">
          <div class="huella">
            <p>INDICE DERECHO</p>
          </div>
        </center>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <center>
          <hr>
          <P>FIRMA DE POSTULANTE</P>
        </center>
      </td>
    </tr>
    <tr>
      <td colspan="3" class="table-header-info">
        <p>Lambayeque, {{ $today }}.</p>
      </td>
    </tr>
  </table>
</body>

</html>

