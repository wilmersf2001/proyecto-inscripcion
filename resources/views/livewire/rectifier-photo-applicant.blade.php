<div>
    <form class="flex flex-col bg-white px-2 sm:px-20">
        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
            <div class="flex items-center sm:px-16 bg-red-50 py-4 rounded-2xl">

                <div class="sm:flex sm:items-start">
                    <div
                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Foto de Inscripción
                            Observada
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Por favor se le comunica subir <b
                                    class="text-red-500">OTRO</b>
                                archivo en formato JPG o JPEG |
                                <b class="text-red-500">NO SUBIR EL MISMO ARCHIVO OBSERVADO</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <div class="flow-root">
                    <div
                        class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8 justify-items-center">
                        <div class="group relative">
                            <div
                                class="relative aspect-h-1 aspect-w-1 w-60 overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-80">
                                <div class="h-full w-full">
                                    <img src="{{ asset('recursos/foto-carnet.jpg') }}" alt=""
                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-red-500 text-9xl">X</div>
                                </div>
                            </div>

                            <label class="block mt-4">
                                <span
                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                    Foto de Carnet
                                </span>
                                <input type="file" wire:model="profilePhoto" wire:click="$set('profilePhoto', null)"
                                    class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-ms file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100
                            " />
                                <x-input-error for="profilePhoto" />
                            </label>
                        </div>

                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-60 overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-80 flex items-center">
                                <div>
                                    <img src="{{ asset('recursos/dni-anverso.jpg') }}" alt="">
                                </div>
                            </div>
                            <label class="block mt-4">
                                <span
                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                    Foto DNI Anverso
                                </span>
                                <input type="file" wire:model="frontDniPhoto"
                                    wire:click="$set('frontDniPhoto', null)"
                                    class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-ms file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100
                            " />
                                <x-input-error for="frontDniPhoto" />
                            </label>
                        </div>

                        <div class="group relative">
                            <div
                                class="aspect-h-1 aspect-w-1 w-60 overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-80 flex items-center">
                                <div>
                                    <img src="{{ asset('recursos/dni-reverso.jpg') }}"
                                        alt="Front of men&#039;s Basic Tee in black.">
                                </div>
                            </div>
                            <label class="block mt-4">
                                <span
                                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                    Foto DNI Reverso
                                </span>
                                <input type="file" wire:model="reverseDniPhoto"
                                    wire:click="$set('reverseDniPhoto', null)"
                                    class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-ms file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100
                            " />
                                <x-input-error for="reverseDniPhoto" />
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 px-4 py-6 sm:px-20">
            <div class="mt-6 flex justify-end">
                <button type="button"
                    class="rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Rectificar
                    Fotos</button>
            </div>
        </div>
    </form>
</div>
