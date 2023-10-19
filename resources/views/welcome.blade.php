<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

  <form action="#" id="miFormulario">
    <!-- Primer campo de entrada -->
    <div id="datosPersonales">
      <div class="my-8 flex items-center gap-x-4">
        <h4 class="flex-none text-lg font-medium leading-none text-indigo-600">Datos Personales</h4>
        <div class="h-px flex-auto bg-gray-100"></div>
      </div>
      <input type="text" name="campo1" placeholder="Campo 1">
      <button type="button" onclick="mostrarSiguienteCampo()">Siguiente</button>
    </div>
  
    <!-- Segundo campo de entrada (inicialmente oculto) -->
    <div id="otrosDatos" class="hidden">
      <input type="text" name="campo2" placeholder="Campo 2">
    </div>
  
    <!-- Botón de enviar -->
    <button type="submit" class="mt-4 text-white bg-blue-600 hover:bg-blue-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Enviar
    </button>
  </form>
  
  <script>
    function mostrarSiguienteCampo() {
      // Oculta el primer campo y muestra el segundo
      document.getElementById('datosPersonales').style.display = 'none';
      document.getElementById('otrosDatos').style.display = 'block';
    }
  </script>
      

</body>
</html>