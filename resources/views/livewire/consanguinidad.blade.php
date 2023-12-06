<div>
    <a wire:click="$set('showModal', true)"
        class="cursor-pointer inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">SI</a>

    <a wire:click="$set('showModal', false)"
        class="cursor-pointer inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">NO</a>

    @if ($showModal)

    <div class="rounded-3xl ring-1 ring-gray-200 mb-10 animate-fade-in">
        <div class="-mt-2 p-2 lg:mt-0 lg:w-full">
            <div class="rounded-2xl bg-gray-50 py-6 lg:py-8 px-8">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Datos Familiares
                </h2>
                <label class="block mb-10">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Categoria
                            </span>
                            <select
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                                <option class="hidden">Seleccionar</option>
                                <option>1°grado de consanguinidad</option>
                                <option>2°grado de consanguinidad</option>
                                <option>3°grado de consanguinidad</option>
                                <option>4°grado de consanguinidad</option>
                            </select>
                        </label>
                <div class="relative">
                    <input type="search" name="num_documento_familiar"
                        wire:model="consanguinidad.num_documento_familiar"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ingrese DNI del familiar" required>
                    <button type="button" wire:click="getFamiliarDataByDni()"
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-center mt-6">

                    <div class="w-full grid md:grid-cols-3 md:gap-6 animate-fade-in" wire:loading.remove>

                        <label class="block mb-3">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Nombres
                            </span>
                            <input type="text" name="nombres_familiar" wire:model="consanguinidad.nombres_familiar"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />

                        </label>
                        <label class="block mb-3">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Apellido Paterno
                            </span>
                            <input type="text" name="ap_paterno_familiar"
                                wire:model="consanguinidad.ap_paterno_familiar"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />

                        </label>
                        <label class="block mb-3">
                            <span
                                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                Apellido Materno
                            </span>
                            <input type="text" name="ap_materno_familiar"
                                wire:model="consanguinidad.ap_materno_familiar"
                                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                        </label>
                        <div class="flex justify-center w-full">
                            <button type="button"
                                class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Agregar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 animate-fade-in">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
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
    </table>
    <div class="flex justify-end w-full">
        <button type="button"
            class="cursor-pointer mt-4 text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Guardar
        </button>
    </div>

</div>
@endif
</div>
