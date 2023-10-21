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


    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/logo_unprg.png') }}" alt="UNPRG" width="40"
                                height="40" />
                        </div>
                        <div class="flex-col ml-2 hidden lg:grid">
                            <p class="text-xs font-semibold text-white">UNIVERSIDAD NACIONAL</p>
                            <p class="text-ms text-white">PEDRO RUIZ GALLO</p>
                        </div>
                    </div>
                    <div class="flex items-baseline">
                        <p class="text-white mr-4">PROCESO DE ADMISIÓN</p>
                        <h4 class="text-yellow-300 font-semibold text-2xl">2024-I</h4>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

                <div class="bg-white">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl rounded-3xl ring-1 ring-gray-200 lg:mx-0 lg:flex lg:max-w-none">
                            <div class="p-8 sm:p-10 lg:flex-auto">
                                <h3 class="text-2xl font-bold tracking-tight text-gray-900">BIENVENIDO POSTULANTE</h3>
                                <p class="mt-6 text-base leading-7 text-gray-600 text-justify">Para continuar, asegúrate de haber
                                    completado el
                                    pago correspondiente en el Banco de la Nación. Luego, ingresa tus datos a
                                    continuación para
                                    verificar el pago realizado y avanzar en tu proceso de admisión.</p>
                                <div class="mt-8 flex items-center gap-x-4 mb-5">
                                    <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">1. Información
                                        del pago
                                    </h4>
                                    <div class="h-px flex-auto bg-gray-100"></div>
                                </div>

                                <div class="grid md:grid-cols-4 md:gap-6">
                                    <label class="block mb-6">
                                        <span
                                            class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                                            DNI
                                        </span>
                                        <input type="text" name="dni" required
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                            placeholder="Ejem: 75635..." />
                                        <x-input-error for="dni" />
                                    </label>
                                    <label class="block mb-6">
                                        <span
                                            class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                                            Voucher
                                        </span>
                                        <input type="text" name="numVoucher" required
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                            placeholder="Ejem: 1742..." />
                                        <x-input-error for="numVoucher" />
                                    </label>
                                    <label class="block mb-6">
                                        <span
                                            class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                                            Agencia
                                        </span>
                                        <input type="text" name="numAgencia" required
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                            placeholder="Ejem: 0230" />
                                        <x-input-error for="numAgencia" />
                                    </label>
                                    <label class="block mb-6">
                                        <span
                                            class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                                            Fecha del pago
                                        </span>
                                        <input type="date" name="fechaPago" required
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                                        <x-input-error for="fechaPago" />
                                    </label>
                                </div>

                                <div class="mt-4 flex items-center gap-x-4 mb-5">
                                    <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">2. Información
                                        adicional
                                        de validación</h4>
                                    <div class="h-px flex-auto bg-gray-100"></div>
                                </div>

                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <label class="block mb-6">
                                        <span
                                            class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                                            Modalidad
                                        </span>
                                        <select
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                            <option value="disabled select hidden">Seleccionar</option>
                                            {{-- @foreach ($modalities as $modalitie)
                                    <option value={{ $modalitie->modalidad_id }}>
                                      {{ $modalitie->modalidad_descripcion }}
                                    </option>
                                  @endforeach --}}
                                        </select>
                                    </label>
                                    <label class="block mb-6">
                                        <span
                                            class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                                            Tipo de colegio de procedencia
                                        </span>
                                        <select
                                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                            <option value="disabled select hidden">Seleccionar</option>
                                            {{-- @foreach ($modalities as $modalitie)
                                    <option value={{ $modalitie->modalidad_id }}>
                                      {{ $modalitie->modalidad_descripcion }}
                                    </option>
                                  @endforeach --}}
                                        </select>
                                        <x-input-error for="numVoucher" />
                                    </label>
                                </div>

                                {{--               <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              Private forum access
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              Member resources
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              Entry to annual conference
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              Official member t-shirt
                            </li>
                          </ul> --}}

                            </div>
                            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                                <div
                                    class="h-full rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                    <div class="mx-auto max-w-xs px-8">
                                        <p class="text-base font-semibold text-gray-600">Pago realizado al</p>
                                        <div class="flex justify-center items-center">
                                            <img src="{{ asset('images/logo_bn.png') }}" alt="Banco de la nacion"
                                                width="45" height="45" />
                                            <p class="ml-4 text-2xl tracking-tight text-gray-600">Banco de la Nación</p>
                                        </div>
                                        <p class="my-16 flex items-baseline justify-center gap-x-2">
                                            <span class="text-5xl font-bold tracking-tight text-gray-900">S/. 349</span>
                                            <span
                                                class="text-sm font-semibold leading-6 tracking-wide text-gray-600">PEN</span>
                                        </p>
                                        <a href="#"
                                            class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">INGRESAR</a>
                                        <p class="mt-6 text-xs leading-5 text-gray-600">Continue al ingreso de los datos
                                            personales y académicos del postulante</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>

</html>
