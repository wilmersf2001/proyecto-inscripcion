<div class="p-4 xl:p-10">

    <x-step-by-step :currentStep="$currentStep" />

    @if ($currentStep < 3)
        <div class="mx-auto max-w-2xl rounded-3xl ring-1 ring-gray-200 lg:mx-0 lg:flex lg:max-w-none bg-gray-50 mb-16">
            <div class="p-4 lg:flex-auto">
                <ul role="list" class="grid grid-cols-1 gap-4 text-xs leading-3 text-gray-600 sm:grid-cols-4 sm:gap-6">
                    <li class="flex gap-x-3">
                        <p class="font-medium text-gray-900">Número de documento :</p> {{ $bank->num_doc_depo }}
                    </li>
                    <li class="flex gap-x-3">
                        <p class="font-medium text-gray-900">Tipo de documento :</p>
                        {{ $bank->tipo_doc_depo == 1 ? 'DNI' : 'Carnet de Extranjería' }}
                    </li>
                    <li class="flex gap-x-3">
                        <p class="font-medium text-gray-900">Número de Voucher :</p> {{ $bank->num_documento }}
                    </li>
                    <li class="flex gap-x-3">
                        <p class="font-medium text-gray-900">Importe :</p> S/. {{ $bank->importe }}
                    </li>
                </ul>
            </div>
        </div>
    @endif
    <form action="{{ route('applicant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="banco_id" value="{{ $bank->id }}">
        <input type="hidden" name="num_documento" value="{{ $bank->num_doc_depo }}">
        <input type="hidden" name="tipo_documento" value="{{ $bank->tipo_doc_depo }}">
        <input type="hidden" name="num_voucher" value="{{ $bank->num_documento }}">
        <input type="hidden" name="modalidad_id" value="{{ $applicant->modalidad_id }}">
        <div class="{{ $currentStep == 1 ? 'animate-slide-in-left' : 'hidden' }}">
            <div class="my-8 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Datos Personales Postulante</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <x-input-form span="Nombres Completos" name="nombres" model="applicant.nombres"
                    disable="{{ $disable }}" />
                <x-input-form span="Apellido Paterno" name="ap_paterno" model="applicant.ap_paterno"
                    disable="{{ $disable }}" />
                <x-input-form span="Apellido Materno" name="ap_materno" model="applicant.ap_materno"
                    disable="{{ $disable }}" />
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <x-input-form span="Fecha de Nacimiento" name="fecha_nacimiento" model="applicant.fecha_nacimiento"
                    type="date" />
                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Seleccione Sexo
                    </span>
                    <select name="sexo_id" wire:model="applicant.sexo_id"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($generos as $genero)
                            <option value={{ $genero->id }}>
                                {{ ucfirst(strtolower($genero->descripcion)) }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="applicant.sexo_id" />
                </label>
            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Lugar de Nacimiento</h4>
                <div class="relative">
                    <x-icons.question />
                    <x-message-question>
                        <x-slot name="message">
                            Correspondiente a los datos de la partida de nacimiento.
                        </x-slot>
                    </x-message-question>
                </div>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>
            @if ($bank->tipo_doc_depo == 1)
                <div class="grid md:grid-cols-3 md:gap-6">
                    <label class="block mb-10">
                        <span class="block mb-2 text-sm font-medium text-gray-900">
                            Departamento
                        </span>
                        <select wire:change="changePlaceBirth('DEPARTMENT',$event.target.value)"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option class="hidden">Seleccionar</option>
                            @foreach ($departaments as $departament)
                                <option value={{ $departament->id }}>
                                    {{ $departament->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block mb-10">
                        <span class="block mb-2 text-sm font-medium text-gray-900">
                            Provincia
                        </span>
                        <select wire:change="changePlaceBirth('PROVINCE',$event.target.value)"
                            wire:model="selectedProvinceBirthId"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option class="hidden">Seleccionar</option>
                            @foreach ($provincesBirth as $provinceBirth)
                                <option value={{ $provinceBirth->id }}>
                                    {{ $provinceBirth->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block mb-10">
                        <span class="block mb-2 text-sm font-medium text-gray-900">
                            Distrito
                        </span>
                        <select name="distrito_nac" wire:model="applicant.distrito_nac_id"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option class="hidden">Seleccionar</option>
                            @foreach ($districtsBirth as $districtBirth)
                                <option value={{ $districtBirth->id }}>
                                    {{ $districtBirth->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="applicant.distrito_nac_id" />
                    </label>
                </div>
            @else
                @php
                    $applicant->distrito_nac_id = 1868;
                @endphp
                <input type="hidden" name="distrito_nac" wire:model="applicant.distrito_nac_id">
                <div class="grid md:grid-cols-3 md:gap-6">
                    <label class="block mb-10">
                        <span class="block mb-2 text-sm font-medium text-gray-900">
                            País de Procedencia
                        </span>
                        <select name="pais_id" wire:model="applicant.pais_id"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option class="hidden">Seleccionar</option>
                            @foreach ($countries as $country)
                                <option value={{ $country->id }}>
                                    {{ $country->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="applicant.pais_id" />
                    </label>
                </div>
            @endif

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Lugar de Residencia</h4>
                <div class="relative">
                    <x-icons.question />
                    <x-message-question>
                        <x-slot name="message">
                            Correspondiente a la ubicación actual donde vive el postulante.
                        </x-slot>
                    </x-message-question>
                </div>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-10">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Departamento
                    </span>
                    <select wire:change="changePlaceReside('DEPARTMENT',$event.target.value)"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($departaments as $departament)
                            <option value={{ $departament->id }}>
                                {{ $departament->nombre }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <label class="block mb-10">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Provincia
                    </span>
                    <select wire:change="changePlaceReside('PROVINCE',$event.target.value)"
                        wire:model="selectedProvinceResideId"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($provincesReside as $provinceReside)
                            <option value={{ $provinceReside->id }}>
                                {{ $provinceReside->nombre }}
                            </option>
                        @endforeach
                    </select>
                </label>
                <label class="block mb-10">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Distrito
                    </span>
                    <select name="distrito_res" wire:model="applicant.distrito_res_id"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($districtsReside as $districtReside)
                            <option value={{ $districtReside->id }}>
                                {{ $districtReside->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="applicant.distrito_res_id" />
                </label>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-10">
                    <span class="block mb-2 text-sm font-medium text-gray-900">
                        Tipo de Dirección
                    </span>
                    <select name="tipo_direccion" wire:model="applicant.tipo_direccion_id"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($adressType as $adress)
                            <option value={{ $adress->id }}>
                                {{ $adress->descripcion }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="applicant.tipo_direccion_id" />
                </label>
                <x-input-form span="Dirección" name="direccion" model="applicant.direccion"
                    placeholder="Ejem: Calle Ficticia 123" />
            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Datos de Contacto</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <x-input-form span="Teléfono del Postulante" name="telefono" model="applicant.telefono"
                    placeholder="Ejem: 955123456" maxlength='9' />

                <x-input-form span="Teléfono del Apoderado" name="telefono_ap" model="applicant.telefono_ap"
                    placeholder="Ejem: 955123456" maxlength='9' />

                <x-input-form span="Correo Electrónico" name="correo" model="applicant.correo" type="email"
                    placeholder="Ejem: postulante@gmail.com" />
            </div>

            <div class="flex w-full justify-end">
                <a href="{{ route('start') }}"
                    class="cursor-pointer mt-4 mr-4 text-gray-900 bg-white hover:bg-gray-100 shadow-md focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Cancelar
                </a>
                <button type="button" wire:click="nextStep"
                    class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Siguiente
                </button>
            </div>
        </div>

        <div class="{{ $currentStep == 2 ? 'animate-slide-in-right relative' : 'hidden' }}">

            <div class="my-8 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Información Académica</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Departamento de Procedencia Colegio
                    </span>
                    <select wire:change="changePlaceOriginSchool('DEPARTMENT',$event.target.value)"
                        wire:model="selectedDepartamentOriginSchoolId"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($departaments as $departament)
                            <option value={{ $departament->id }}>
                                {{ $departament->nombre }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Provincia de Procedencia Colegio
                    </span>
                    <select wire:change="changePlaceOriginSchool('PROVINCE',$event.target.value)"
                        wire:model="selectedProvinceOriginSchoolId"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($provincesOriginSchool as $provinceOriginSchool)
                            <option value={{ $provinceOriginSchool->id }}>
                                {{ $provinceOriginSchool->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="selectedProvinceOriginSchoolId" />
                </label>

                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Distrito de Procedencia Colegio
                    </span>
                    <select wire:model="selectedDistrictOriginSchoolId"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($districtsOriginSchool as $districtOriginSchool)
                            <option value={{ $districtOriginSchool->id }}>
                                {{ $districtOriginSchool->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="selectedDistrictOriginSchoolId" />
                </label>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <label class="block mb-10 relative">
                    <input type="hidden" name="colegio_id" wire:model="applicant.colegio_id">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Nombre del Colegio
                    </span>
                    <input type="text" wire:model.debounce.500ms="searchSchoolName"
                        wire:input="$set('showSchools', true)"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: San Martín de los Andes" />

                    @if ((!$selectedDistrictOriginSchoolId || !$typeSchool) && $searchSchoolName != null && !$errors->any())
                        <p class="absolute peer-invalid:visible text-red-600 text-xs animate-slide-in-left">
                            seleccione el distrito de procedencia y tipo colegio</p>
                    @endif

                    @if (session()->has('null'))
                        <p class="absolute peer-invalid:visible text-red-600 text-xs animate-slide-in-left">
                            {{ session('null') }}</p>
                    @else
                        @if ($showSchools && $selectedDistrictOriginSchoolId && $typeSchool)
                            <ul
                                class="w-full absolute shadow bg-white max-w-md max-h-48 p-2 overflow-y-auto text-sm text-gray-700">
                                @foreach ($schools as $school)
                                    <li wire:click="updateSchool({{ $school->id }})">
                                        <div
                                            class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover-bg-gray-200 cursor-pointer">
                                            <p
                                                class="w-full py-2 text-xs font-medium text-gray-900 rounded dark:text-gray-900">
                                                {{ $school->nombre }}
                                            </p>
                                            <span
                                                class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs text-blue-700 ring-1 ring-inset ring-blue-700/10">{{ $school->distrito }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                    <x-input-error for="applicant.colegio_id" />
                </label>

                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Año de Egreso del Colegio
                    </span>
                    @if ($applicant->modalidad_id)
                        <select name="anno_egreso" wire:model="applicant.anno_egreso"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option class="hidden">Seleccionar</option>
                            @php
                                $maxYear = $applicant->modalidad_id != 10 ? date('Y') - 1 : date('Y');
                            @endphp
                            @for ($i = $minimumYear; $i <= $maxYear; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    @else
                        <input type="text" disabled placeholder="Seleccione el modalidad"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block w-full rounded-md sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" />
                    @endif
                    <x-input-error for="applicant.anno_egreso" />
                </label>

            </div>

            <div class="mb-8 mt-4 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Información de Postulación
                </h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-3 md:gap-6">

                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Sede de Postulación
                    </span>
                    <select name="sede_id" wire:model="applicant.sede_id"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        @foreach ($sedes as $sede)
                            <option value={{ $sede->id }}>
                                {{ $sede->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error for="applicant.sede_id" />
                </label>

                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Programa Académico al que Postula
                    </span>
                    @if ($applicant->modalidad_id)
                        <select name="programa_academico_id" wire:model="applicant.programa_academico_id"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                            <option class="hidden">Seleccionar</option>
                            @foreach ($academicPrograms as $academicProgram)
                                <option value={{ $academicProgram->programa_academico_id }}>
                                    {{ $academicProgram->programaAcademico->nombre }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" disabled placeholder="Seleccione la modalidad"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block w-full rounded-md sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" />
                    @endif
                    <x-input-error for="applicant.programa_academico_id" />
                </label>

                <x-input-form span="Número de veces que postula a la UNPRG" name="num_veces_unprg"
                    model="applicant.num_veces_unprg" type="number" />


            </div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <x-input-form span="Número de veces que postula a otras universidades" name="num_veces_otro"
                    model="applicant.num_veces_otros" type="number" />
            </div>

            <div class="flex w-full justify-end">
                <button type="button" wire:click="previousStep"
                    class="cursor-pointer mt-4 mr-4 text-gray-900 bg-white hover:bg-gray-100 shadow-md focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Atrás
                </button>
                <button type="button" wire:click="nextStep"
                    class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Siguiente
                </button>
            </div>
        </div>

        <div class="{{ $currentStep == 3 ? 'animate-slide-in-right' : 'hidden' }}">

            <div class="my-8 flex items-center gap-x-4">
                <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Archivos Requeridos
                </h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="mx-auto grid max-w-7xl gap-x-8 gap-y-20 xl:grid-cols-3">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-x-4">
                        <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">CARNET</h4>
                        <div class="h-px flex-auto bg-gray-100"></div>
                    </div>
                    <ul role="list" class="mt-4 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600">
                        <li class="flex gap-x-3">
                            <x-icons.check />
                            Iluminación uniforme y suave, evitando sombras fuertes en el rostro.
                        </li>
                        <li class="flex gap-x-3">
                            <x-icons.check />
                            La imagen que enfoque correctamente tu rostro y utiliza fondo blanco.
                        </li>
                        <li class="flex gap-x-3">
                            <x-icons.check />
                            Ropa apropiada, evita estampados llamativos.
                        </li>
                        <li class="flex gap-x-3">
                            <x-icons.check />
                            Expresión facial tranquila y neutral, sin sonreír ni fruncir el ceño.
                        </li>
                    </ul>
                    <div class="mt-6 flex items-center gap-x-4">
                        <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">DNI</h4>
                        <div class="h-px flex-auto bg-gray-100"></div>
                    </div>
                    <ul role="list" class="mt-4 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600">
                        <li class="flex gap-x-3">
                            <x-icons.check />
                            Asegúrate de que la imagen del esté completamente legible y sin reflejos para evitar
                            problemas al verificar la información.
                        </li>
                    </ul>
                </div>
                <div class="grid gap-x-8 gap-y-12 sm:grid-cols-1 sm:gap-y-16 xl:col-span-2">
                    <div>
                        <div class="grid md:grid-cols-1 md:gap-6">
                            <x-input-file span="Foto Carnet Postulante" name="profilePhoto" model="profilePhoto"
                                alt="FOTO CARNET" src="images/foto-carnet.jpg" click="$set('profilePhoto', null)" />
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6 mb-10">
                            <x-input-file span="DNI Parte Anverso" name="frontDniPhoto" model="frontDniPhoto"
                                alt="DNI ANVERSO" src="images/dni-anverso.png" click="$set('frontDniPhoto', null)"
                                size="140" />
                            <x-input-file span="DNI Parte Reverso" name="reverseDniPhoto" model="reverseDniPhoto"
                                alt="DNI REVERSO" src="images/dni-reverso.png" click="$set('reverseDniPhoto', null)"
                                size="140" />
                        </div>
                        <div class="flex w-full justify-end">
                            <button type="button" wire:click="previousStep"
                                class="cursor-pointer mt-4 mr-4 text-gray-900 bg-white hover:bg-gray-100 shadow-md focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Atrás
                            </button>
                            <button type="button" wire:click="nextStep"
                                class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Siguiente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($currentStep > 3)
            @livewire('summary-template', ['applicant' => $applicant, 'tipo_documento' => $bank->tipo_doc_depo])

            <div
                class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                <div class="p-8 sm:p-10 lg:flex-auto">
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900">DECLARACIÓN JURADA</h3>
                    <time datetime="2020-03-16" class="text-gray-500">{{ $formattedToday }}</time>
                    <div class="relative flex mt-6">
                        <div class="flex h-6 items-center">
                            <input id="accordance" name="accordance" type="checkbox" wire:model="accordance"
                                class="h-4 w-4 rounded text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm">
                            <label for="accordance" class="font-medium text-gray-900 pl-2">Declaro bajo juramento
                                que:</label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                            <li class="text-gray-400"><span class="text-gray-600">Conozco, acepto y me someto a las
                                    bases,
                                    condiciones y procedimientos establecidos en eI
                                    Reglamento del Concurso de Admisión 2016-II de la Universidad Nacional
                                    Pedro Ruiz Gallo.</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">La información y fotografia
                                    registrada es
                                    AUTÉNTICA y que las imágenes de mi DNI enviados para
                                    mi inscripción como postulante al presente Concurso de Admisión,
                                    son copia fiel al original, en caso de faltar a la verdad me someto a las sanciones
                                    correspondientes (Art. 38 del Reglamento del presente Concurso de Admisión).</span>
                            </li>
                            <li class="text-gray-400"><span class="text-gray-600">No tengo impedimento para participar
                                    en eI
                                    Concurso de Admisión 2016-11.</span></li>
                            <li class="text-gray-400"><span class="text-gray-600">De alcanzar una vacante, me
                                    comprometo a
                                    regularizar mi expediente en la fecha establecida en el
                                    cronograma del presente Concurso de Admisión; en caso contrario
                                    me someto a las sanciones correspondientes (Art.87 del Reglamento del presente
                                    Concurso de
                                    Admisión).</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex w-full justify-end">
                <button type="button" wire:click="previousStep"
                    class="cursor-pointer mt-4 mr-4 text-gray-900 bg-white hover:bg-gray-100 shadow-md focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Atrás
                </button>
                @if ($accordance)
                    <button type="submit"
                        class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center animate-slide-in-down">
                        Finalizar y Enviar
                    </button>
                @endif
            </div>
        @endif
    </form>

    <div wire:offline>
        You are now offline.
    </div>
</div>
