<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
</head>

<body>

    <h1>Consultar DNI</h1>

    <form action="/consultar-dni" method="POST">
        @csrf
        <label for="dni">Ingrese DNI:</label><br>
        <input type="text" id="dni" name="dni"><br><br>
        <button type="submit">Consultar</button>
    </form>

    @isset($applicantData)
        <h2>Resultados:</h2>
        <p>Nombre: {{ $applicantData->nombres }}</p>
        <p>Apellido Paterno: {{ $applicantData->apellidoPaterno }}</p>
        <p>Apellido Materno: {{ $applicantData->apellidoMaterno }}</p>
    @endisset

</body>

</html>
