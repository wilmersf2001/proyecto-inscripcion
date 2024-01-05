<div>
    <a wire:click="$set('showModal', true)"
        class="cursor-pointer inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto mb-7">SI</a>
    <a wire:click="$set('showModal', false)"
        class="cursor-pointer inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto mb-7">NO</a>
    @if ($showModal)
    <div class="rounded-5xl ring-1 ring-gray-200 mb-10 animate-fade-in">
        <div class="-mt-2 p-2 lg:mt-0 lg:w-full">
            <div class="rounded-2xl bg-gray-50 py-6 lg:py-8 px-8">
                <h4 class="flex-none text-lg font-medium leading-none text-indigo-600">Informacion del Familiar</h4>
                <p class="mt-1 text-sm leading-6 text-gray-600 mb-4">Por favor ingrese los datos de su familiar.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-1">
                        <label class="block mb-2">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Tipo de parentesco
                            </span>
                            <select wire:model="subcategoria" wire:change="actualizarCategorias"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                <option value="" class="hidden">Seleccionar</option>
                                @foreach ($subcategorias as $subcat)
                                <option value="{{ $subcat->parentesco }}">
                                    {{ $subcat->parentesco }}
                                </option>
                                @endforeach
                            </select>
                            <x-input.error for="subcategoria" />
                        </label>
                    </div>

                    <div class="col-span-1">
                        <label class="block mb-2">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Categoría
                            </span>
                            <input type="text" wire:model="categoria"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                                readonly>
                            <x-input.error for="categoria" />
                        </label>
                    </div>

                    <div class="col-span-1">
                        <label class="block mb-2"> @if (intval($this->categoria) !== 3 && intval($this->categoria) !==
                            4)
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                DNI
                            </span>
                            <input wire:model="dniFamiliar" type="text" name="dni_familiar" maxlength="8"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                            <x-input.error for="dniFamiliar" />
                        </label> @endif
                    </div>
                </div>


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
                            @if ($modoEdicion)
                            <button type="button" wire:click="agregarFamiliar"
                                class="cursor-pointer mt-0 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Modificar
                            </button>
                            @else
                            <button type="button" wire:click="agregarFamiliar"
                                class="cursor-pointer mt-0 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Agregar
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-100">DNI</th>
                    <th class="px-6 py-3 bg-gray-100">Nombres</th>
                    <th class="px-6 py-3 bg-gray-100">Apellidos</th>
                    <th class="px-6 py-3 bg-gray-100">Categoría</th>
                    <th class="px-6 py-3 bg-gray-100">Parentesco</th>
                    <th class="px-6 py-3 bg-gray-100">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($familiares as $index => $familiar)
                <tr>
                    <td class="px-6 py-3 text-center">{{ $familiar['dni'] }}</td>
                    <td class="px-6 py-3 text-center">{{ $familiar['nombres'] }}</td>
                    <td class="px-6 py-3 text-center">{{ $familiar['ap_paterno'] }} {{ $familiar['ap_materno'] }}</td>
                    <td class="px-6 py-3 text-center">{{ $familiar['categoria'] }}</td>
                    <td class="px-6 py-3 text-center">{{ $familiar['parentesco'] }}</td>
                    <td class="px-6 py-3 text-center">
                        <button wire:click.prevent="editarFamiliar({{ $index }})" class="text-blue-600 hover:underline">
                            <x-icons.pencil flag='0' size='5' />
                        </button>
                    </td>
                    <button wire:click.prevent="finalizar" class="text-blue-600 hover:underline">
                        Finalizar
                    </button>
                </tr>
                @endforeach

            </tbody>
        </table>
        @endif
    </div>
