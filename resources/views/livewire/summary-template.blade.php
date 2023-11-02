<div>
    <div class="px-4 sm:px-0 mb-8">
        <h3 class="text-3xl font-semibold leading-7 text-gray-900">Resumen de la Información del Postulante</h3>
        <p class="mt-1 max-w-2xl text-base leading-6 text-gray-500">Datos proporcionados en formulario</p>
    </div>

    <ul role="list" class="grid gap-x-16 gap-y-8 sm:grid-cols-2 sm:gap-y-12 xl:col-span-2">
        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-blue-600">
                <h4 class="flex-none text-sm font-bold leading-6 text-white"> DATOS PERSONALES</h4>
            </div>
            <dl class="grid grid-cols-1 gap-x-6 gap-y-4 py-4 px-6">
                <div class="pt-2">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nombres</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($applicant->nombres) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Apellidos</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($applicant->ap_paterno) }}
                            {{ strtoupper($applicant->ap_materno) }}
                        </dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Fecha de Nacimiento</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $formattedDateNac }}
                        </dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sexo</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($nameSexo) }}
                        </dd>
                    </div>
                </div>
            </dl>
        </li>

        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-blue-600">
                <h4 class="flex-none text-sm font-semibold leading-6 text-white"> LUGAR DE NACIMIENTO </h4>
            </div>
            <dl class="grid grid-cols-1 gap-x-6 gap-y-4 py-4 px-6">
                <div class="pt-2">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Distrito de Nacimiento</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($distrit) }}
                        </dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Distrito de Residencia</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($districtAddress) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Tipo de Dirección</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($typeAddress) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Dirección</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($applicant->direccion) }}</dd>
                    </div>
                </div>
            </dl>
        </li>

        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-blue-600">
                <svg class="mr-2.5 h-5 w-5 flex-none stroke-white" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <h4 class="flex-none text-sm font-semibold leading-6 text-white"> DATOS DE CONTACTO </h4>
            </div>
            <dl class="grid grid-cols-1 gap-x-6 gap-y-4 py-4 px-6">
                <div class="pt-2">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono de Postulante</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($applicant->telefono) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono de Apoderado</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($applicant->telefono_ap) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Correo Electrónico</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $applicant->correo }}</dd>
                    </div>
                </div>
            </dl>
        </li>

        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-blue-600">
                <svg class="mr-2.5 h-5 w-5 flex-none stroke-white" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <h4 class="flex-none text-sm font-semibold leading-6 text-white"> INFORMACIÓN ACADÉMICA </h4>
            </div>
            <dl class="grid grid-cols-1 gap-x-6 gap-y-4 py-4 px-6">
                <div class="pt-2">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Distrito del Colegio</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($districtSchool) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nombre del Colegio</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($nameSchool) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">N° Postulación a Otras Universidades
                        </dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $applicant->num_veces_otros }}</dd>
                    </div>
                </div>
            </dl>
        </li>

        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-blue-600">
                <svg class="mr-2.5 h-5 w-5 flex-none stroke-white" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <h4 class="flex-none text-sm font-semibold leading-6 text-white"> INFORMACIÓN DE POSTULACIÓN</h4>
            </div>
            <dl class="grid grid-cols-1 gap-x-6 gap-y-4 py-4 px-6">
                <div class="pt-2">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sede</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ strtoupper($sede) }}
                        </dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Programa Académico</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($programAcademic) }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">N° Postulación a la UNPRG</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $applicant->num_veces_unprg }}</dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Modalidad</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($modality) }}
                        </dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Año de Egreso</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $applicant->anno_egreso }}</dd>
                    </div>
                </div>
            </dl>
        </li>
    </ul>
</div>
