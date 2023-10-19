<div class="p-10">

  <ol class="flex items-center w-full mb-4 sm:mb-5 justify-center">
    <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
        <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
          <x-icons.identification /> 
        </div>
    </li>
    <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
        <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
          <x-icons.academic-cap />
        </div>
    </li>
    <li class="flex items-center">
        <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
            <x-icons.document />
        </div>
    </li>
</ol>
<form action="#">

  <div class="my-8 flex items-center gap-x-4">
    <h4 class="flex-none text-lg font-medium leading-none dark:text-white text-indigo-600">Datos Personales</h4>
    <div class="h-px flex-auto bg-gray-100"></div>
  </div>
    <div class="grid md:grid-cols-3 md:gap-6">
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Nombres Completos
        </span>
        <input type="text" name="apPaterno" required
          class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Apellido Paterno
        </span>
        <input type="text" name="apPaterno" required
          class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
      <label class="block mb-6">
        <span class="block text-sm font-medium text-slate-700">
          Apellido Materno
        </span>
        <input type="text" name="apMaterno" required
          class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
        <x-input-error for="applicant.postulante_apMaterno" />
      </label>
    </div>

    <div class="grid md:grid-cols-3 md:gap-6">
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Fecha de Nacimiento
        </span>
        <input type="date" name="fechaNacimiento" required
          class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Seleccione Sexo
        </span>
        <select class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
            <option value='1'>Masculino</option>
            <option value='2'>Femenino</option>
        </select>
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
    </div>

    <div class="my-8 flex items-center gap-x-4">
      <h4 class="flex-none text-lg font-medium leading-none dark:text-white text-indigo-600">Lugar de Nacimiento</h4>
      <div class="h-px flex-auto bg-gray-100"></div>
    </div>

    <div class="grid md:grid-cols-3 md:gap-6">
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Departamento
        </span>
        <input type="date" name="fechaNacimiento" required
          class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Seleccione Sexo
        </span>
        <select class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
            <option value='1'>Masculino</option>
            <option value='2'>Femenino</option>
        </select>
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
      <label class="block mb-6">
        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Seleccione Sexo
        </span>
        <select class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
            <option value='1'>Masculino</option>
            <option value='2'>Femenino</option>
        </select>
        <x-input-error for="applicant.postulante_apPaterno" />
      </label>
    </div>



    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Next Step: Payment Info
    </button>
</form>


</div>
