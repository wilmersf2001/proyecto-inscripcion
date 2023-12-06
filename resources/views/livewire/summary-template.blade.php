<div class="animate-fade-in">
    <div class="sm:px-0 mb-8">
        <h3 class="text-3xl font-semibold leading-7 text-gray-900">Resumen de la Información del Postulante</h3>
        <p class="mt-1 max-w-2xl text-base leading-6 text-gray-500">Datos proporcionados en el formulario | Verifique sus
            datos antes de enviar</p>
    </div>

    <ul role="list" class="grid gap-x-16 gap-y-8 sm:grid-cols-2 sm:gap-y-12 xl:col-span-2">
        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-sky-200">
                <h4 class="flex-none text-sm font-semibold leading-6 text-sky-900"> DATOS PERSONALES</h4>
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
                        <dt class="text-sm font-medium leading-6 text-gray-900">Sexo</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($nameSexo) }}
                        </dd>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Fecha de Nacimiento</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ strtoupper($formattedDateNac) }}
                        </dd>
                    </div>
                </div>
                @if ($isAgeMinor)
                    <div class="border-t border-gray-200 pt-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Apoderado</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ strtoupper($applicant->nombres_apoderado) }}
                                {{ strtoupper($applicant->ap_paterno_apoderado) }}
                                {{ strtoupper($applicant->ap_materno_apoderado) }}
                            </dd>
                        </div>
                    </div>
                @endif
            </dl>
        </li>

        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-sky-200">
                <h4 class="flex-none text-sm font-semibold leading-6 text-sky-900"> LUGAR DE NACIMIENTO Y RESIDENCIA
                </h4>
            </div>
            <dl class="grid grid-cols-1 gap-x-6 gap-y-4 py-4 px-6">
                <div class="pt-2">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        @if ($tipo_documento == 1)
                            <dt class="text-sm font-medium leading-6 text-gray-900">Ubicación de Nacimiento</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $applicant->distritoNac->provincia->departamento->nombre }} |
                                {{ $applicant->distritoNac->provincia->nombre }} | {{ strtoupper($distritNac) }}
                            </dd>
                        @else
                            <dt class="text-sm font-medium leading-6 text-gray-900">País de Procedencia</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ strtoupper($applicant->pais->nombre) }}
                            </dd>
                        @endif
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Ubicación de Residencia</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $applicant->distritoRes->provincia->departamento->nombre }} |
                            {{ $applicant->distritoRes->provincia->nombre }} | {{ strtoupper($districtAddress) }}
                        </dd>
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
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-sky-200">
                <h4 class="flex-none text-sm font-semibold leading-6 text-sky-900"> DATOS DE CONTACTO </h4>
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
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-sky-200">
                <h4 class="flex-none text-sm font-semibold leading-6 text-sky-900"> INFORMACIÓN ACADÉMICA </h4>
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
                @if ($university)
                    <div class="border-t border-gray-200 pt-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Universidad de Procedencia
                            </dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ strtoupper($university) }}</dd>
                        </div>
                    </div>
                @endif
            </dl>
        </li>

        <li class="rounded-2xl ring-1 ring-gray-200">
            <div class="flex items-center gap-x-4 rounded-tl-2xl rounded-tr-2xl py-2 px-4 bg-sky-200">
                <h4 class="flex-none text-sm font-semibold leading-6 text-sky-900"> INFORMACIÓN DE POSTULACIÓN</h4>
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
