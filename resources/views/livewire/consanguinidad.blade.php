<div>
    <a wire:click="$set('showModal', true)"
        class="cursor-pointer inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto mb-7">SI</a>
    <a wire:click="$set('showModal', false)"
        class="cursor-pointer inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto mb-7">NO</a>
    @if ($showModal)
    <div class="rounded-5xl ring-1 ring-gray-200 mb-10 animate-fade-in">
        <div class="-mt-2 p-2 lg:mt-0 lg:w-full">
            <div class="rounded-2xl bg-gray-50 py-6 lg:py-8 px-8">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Información del Familiar
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 mb-4">Por favor
                    ingrese los datos de su familiar.</p>
                <label class="block mb-10">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Categoria
                    </span>
                    <select wire:model="categoria"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                        <option class="hidden">Seleccionar</option>
                        <option>1° Grado de Consanguinidad</option>
                        <option>2° Grado de Consanguinidad</option>
                        <option>3° Grado de Consanguinidad</option>
                        <option>4° Grado de Consanguinidad</option>
                    </select>
                    <x-input.error for="categoria" />
                </label>
                @if(in_array($categoria, ['2° Grado de Consanguinidad', '3° Grado de Consanguinidad', '4° Grado de Consanguinidad']))
                @else
                <label class="block mb-2">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        DNI
                    </span>
                    <input wire:model="dniFamiliar" type="text" name="dni_familiar" maxlength="8"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input.error for="dniFamiliar" />
                </label>
                @endif
                <div class="flex justify-center mt-6">
                    <div class="w-full grid md:grid-cols-3 md:gap-6 animate-fade-in">

                        <label class="block mb-3">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Nombres
                            </span>
                            <input type="text" name="nombres_familiar" wire:model="nombresFamiliar"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                            <x-input.error for="nombresFamiliar" />
                        </label>
                        <label class="block mb-3">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Apellido Paterno
                            </span>
                            <input type="text" name="ap_paterno_familiar" wire:model="apPaternoFamiliar"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                            <x-input.error for="apPaternoFamiliar" />
                        </label>
                        <label class="block mb-3">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Apellido Materno
                            </span>
                            <input type="text" name="ap_materno_familiar" wire:model="apMaternoFamiliar"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                            <x-input.error for="apMaternoFamiliar" />
                        </label>
                        <div class="flex justify-center md:col-span-3">
                            <button type="button" wire:click="agregarFamiliar"
                                class="cursor-pointer mt-0 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 animate-fade-in">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        DNI
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Apellidos
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Categoría
                    </th>
                </tr>
            </thead>
            @foreach ($familiares as $familiar)
            <tr>
                <td class="px-6 py-4 text-center">{{ $familiar['dni'] }}</td>
                <td class="px-6 py-4 text-center">{{ $familiar['nombres'] }}</td>
                <td class="px-6 py-4 text-center">{{ $familiar['ap_paterno'] }} {{ $familiar['ap_materno'] }}</td>
                <td class="px-6 py-4 text-center">{{ $familiar['categoria'] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    @endif
</div>