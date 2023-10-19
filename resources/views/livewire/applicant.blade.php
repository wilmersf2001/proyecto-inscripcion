<div class="p-10">
    <ol class="flex items-center w-full mb-4 sm:mb-5 justify-center">
        <li
            class="flex w-full items-center text-blue-600 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block">
            <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12">
                <x-icons.identification />
            </div>
        </li>
        <li
            class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block">
            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12">
                <x-icons.academic-cap />
            </div>
        </li>
        <li class="flex items-center">
            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12">
                <x-icons.document />
            </div>
        </li>
    </ol>

    <form action="{{ route('applicant.store') }}" method="POST">
        @csrf
        <div class="{{ $currentStep == 1 ? '' : 'hidden' }}">
            <div class="my-8 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Datos Personales Postulante</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Nombres Completos
                    </span>
                    <input type="text" name="nombres" wire:model="applicant.postulante_nombres"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="applicant.postulante_nombres" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Apellido Paterno
                    </span>
                    <input type="text" name="apPaterno" wire:model="applicant.postulante_apPaterno"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="applicant.postulante_apPaterno" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Apellido Materno
                    </span>
                    <input type="text" name="apMaterno" wire:model="applicant.postulante_apMaterno"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="applicant.postulante_apMaterno" />
                </label>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Fecha de Nacimiento
                    </span>
                    <input type="date" name="fechaNacimiento"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Seleccione Sexo
                    </span>
                    <select name="sexo" {{-- wire:model="applicant.postulante_sexo" --}}
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Masculino</option>
                        <option value='2'>Femenino</option>
                    </select>
                    <x-input-error for="" />
                </label>
            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Lugar de Nacimiento</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Departamento
                    </span>
                    <select name="departamentoNac"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Provincia
                    </span>
                    <select name="provinciaNac"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Distrito
                    </span>
                    <select name="distritoNac"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Lugar de Residencia</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Departamento
                    </span>
                    <select name="departamentoRes"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Provincia
                    </span>
                    <select name="provinciaRes"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Distrito
                    </span>
                    <select name="distritoRes"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Tipo de Dirección
                    </span>
                    <select name="tipoDireccion"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Dirección
                    </span>
                    <input type="text" name="direccion"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: Calle Ficticia 123" />
                    <x-input-error for="applicant.postulante_apPaterno" />
                </label>
            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Datos de Contacto</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Teléfono del Postulante
                    </span>
                    <input type="tel" name="telefonoPos"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 955123456" />
                    <x-input-error for="applicant.postulante_apPaterno" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Teléfono del Apoderado
                    </span>
                    <input type="tel" name="telefonoAp"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 955123456" />
                    <x-input-error for="applicant.postulante_apPaterno" />
                </label>
                <label class="block mb-6">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Correo Electrónico
                    </span>
                    <input type="email" name="correo"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: postulante@gmail.com" />
                    <x-input-error for="applicant.postulante_apMaterno" />
                </label>
            </div>
        </div>

        <div class="{{ $currentStep == 2 ? '' : 'hidden' }}">
            <div class="my-8 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Información Académica</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Departamento de Procedencia Colegio
                    </span>
                    <select name="departamentoProcedenciaColegio"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Nombre del Colegio
                    </span>
                    <select name="colegio"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Año de Egreso del Colegio
                    </span>
                    <select name="annoEgresoColegio"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Número de veces que postula a la UNPRG
                    </span>
                    <input type="number" name="numUnprg"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Número de veces que postula a otras universidades
                    </span>
                    <input type="number" name="numOtras"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="" />
                </label>
            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Información de la Universidad
                </h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Sede de Postulación
                    </span>
                    <select name="sede"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Programa Académico al que Postula
                    </span>
                    <select name="programaAcademico"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option value='1'>Ejemplo</option>
                    </select>
                    <x-input-error for="" />
                </label>
            </div>

        </div>


        <div class="flex w-full justify-end">
            @if ($currentStep != 1)
                <a wire:click="previousStep"
                    class="cursor-pointer mt-4 mr-4 text-gray-900 bg-white hover:bg-gray-100 shadow-md focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Siguiente
                </a>
            @else
                <button type="submit"
                    class="cursor-pointer mt-4 mr-4 text-gray-900 bg-white hover:bg-gray-100 shadow-md focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Cancelar
                </button>
            @endif
            <a wire:click="nextStep"
                class="cursor-pointer mt-4 text-white bg-blue-600 hover:bg-blue-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Siguiente
            </a>
        </div>
    </form>

    <div wire:offline>
        You are now offline.
    </div>
</div>
