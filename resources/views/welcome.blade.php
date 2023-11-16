<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postulante</title>
    <style>
        * {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            border-collapse: collapse;
        }

        .container .logo_unprg {
            width: 32%;
            height: 160px;
            padding-top: 20px;
            background-color: #003D5E;
            /* background-color: #2974B5; */
        }

        .container .encabezado {
            padding-top: 15px;
        }

        .left-column {
            background-color: #f4f4f4;
        }

        .container td {
            padding: 0 15px;
            vertical-align: top;
        }

        .container .left-column .info-contacto {
            margin-top: 40px;
        }

        .left-column .info-contacto ul {
            list-style: none;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            background-color: #fff;
            border-radius: 10px;
        }

        .left-column .info-contacto ul li {
            margin: 10px 0;
        }

        .right-column .info-contacto ul {
            list-style: none;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
        }

        .right-column .info-contacto ul li {
            margin-bottom: 12px;
        }

        .items {
            border: 1px solid #ccc;
            padding: 5px 10px;
            text-align: center;
            color: #003D5E;
            border-radius: 5px;
        }

        .declaracion {
            border-radius: 10px;
        }

        .declaracion li {
            padding: 5px 10px;
            background-color: #ECF8F9;
            border-radius: 10px;
        }

        .huella {
            position: relative;
            width: 105px;
            height: 130px;
            font-size: 10px;
            margin: 25px auto;
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

        td {
            height: 5px;
        }

        .azul {
            background-color: #2974B5;
        }

        .celeste {
            background-color: #7CD3E7;
        }

        .amarillo {
            background-color: #FEC400;
        }

        .plomo {
            background-color: #747474;
        }

        .container .footer {
            padding-top: 40px;
            height: 50px;
        }

        .container .footer p {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <table class="container">
        <tr>
            <td class="azul"></td>
            <td class="celeste"></td>
            <td class="amarillo"></td>
            <td class="plomo"></td>
        </tr>
        <tr>
            <td class="logo_unprg" colspan="1" align="center">
                <img src={{ public_path('images/fotoprueba.jpg') }} alt="logo_unprg" width="130" height="140">
            </td>
            <td class="encabezado" colspan="3" align="center">
                <h1>Universidad Nacional Pedro Ruiz Gallo</h1>
                <div style="line-height: 1.5;">
                    <p>CONSTANCIA DE INSCRIPCIÓN DEL
                        POSTULANTE</p>
                    <p>EXAMEN DE ADMISIÓN 2024-I</p>
                </div>
            </td>
        </tr>
        <tr>
            <td class="left-column">
                <div class="info-contacto">
                    <h5 class="items">INFORMACIÓN DE CONTACTO</h5>
                    <ul>
                        <li><b>Teléfono:</b> 123-456-789</li>
                        <li><b>Correo:</b> ejemplo@gmail.com</li>
                        <li><b>Dirección:</b> Ciudad, País</li>
                    </ul>
                </div>
                <div class="info-contacto">
                    <h5 class="items">DATOS DE POSTULACIÓN</h5>
                    <ul>
                        <li><b>Sede:</b> 123-456-789</li>
                        <li><b>Modalidad:</b> ejemplo@gmail.com</li>
                        <li><b>Programa Académico:</b> Ciudad, País</li>
                    </ul>
                </div>
                <div class="info-contacto" align="center">
                    <h5 class="items" style="margin-bottom: 10px">IDENTIFICACIÓN</h5>
                    <img src="data:image/png;charset=utf-8;base64,{{ base64_encode(QrCode::encoding('UTF-8')->generate('asdasdasdasdasdasdasda')) }}"
                        alt="Código QR">
                    <div class="huella">
                        <p>INDICE DERECHO</p>
                    </div>
                </div>
            </td>
            <td class="right-column" colspan="3">
                <div class="info-contacto">
                    <h5 class="items">DATOS PERSONALES</h5>
                    <ul>
                        <li><b>Nombres y Apellidos:</b> Wilmer Yoel Suclupe Farroñan</li>
                        <li><b>DNI:</b> 75085359</li>
                        <li><b>Fecha de nacimiento:</b> 19-01-2001</li>
                        <li><b>Lugar de nacimiento:</b> Lambayeque | Lambayeque | Chiclayo | Perú</li>
                        <li><b>Lugar de residencia:</b> Lambayeque | Lambayeque | Chiclayo | Perú</li>
                        <li><b>Telefono de apoderado:</b> 964546726</li>
                    </ul>
                </div>
                <div class="info-contacto">
                    <h5 class="items">INFORMACIÓN ACADÉMICA</h5>
                    <ul>
                        <li><b>Ubicación de estudio:</b> 123-456-789</li>
                        <li><b>Colegio:</b> ejemplo@gmail.com</li>
                        <li><b>Tipo de colegio:</b> Ciudad, País</li>
                        <li><b>Año de egreso:</b> 2020</li>
                    </ul>
                </div>
                <div class="info-contacto">
                    <h5 class="items">DECLARACIÓN JURADA</h5>
                    <ul class="declaracion">
                        <li>Conozco, acepto y me someto a las bases, condiciones y procedimientos establecidos en el
                            Reglamento del
                            Concurso de Admisión , de la Universidad Nacional Pedro Ruiz Gallo.</li>
                        <li>La información y fotografia registrada es AUTÉNTICA y que las imágenes de mi DNI enviados
                            para
                            mi
                            inscripción como postulante al presente Concurso de Admisión, son copia fiel al original; en
                            caso de faltar
                            a la verdad, me someto a las sanciones correspondientes (Art.23 del Reglamento del presente
                            Concurso de
                            Admisión).</li>
                        <li>No tengo impedimento para participar en el Concurso de Admisión.</li>
                        <li>
                            De alcanzar una vacante, me comprometo a regularizar mi expediente en la fecha establecida
                            en el
                            cronograma
                            del presente Concurso de Admisión en caso contrario me someto a las sanciones
                            correspondientes
                            (Art.68 del
                            Reglamento del presente Concurso de Admisión).
                        </li>
                        <li>
                            He culminado el 5to año de Educación Secundaria antes del Concurso de Admisión
                            .
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="footer" style="padding-left: 50px">
                <p>Lambayeque, hoy.</p>
            </td>
            <td colspan="1" class="footer" align="center" style="padding-right: 60px">
                <hr>
                <P>Firma de Postulante</P>
            </td>
        </tr>
    </table>
</body>

</html>
