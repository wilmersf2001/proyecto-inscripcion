<div>
    <form action="{{ route('photo.storeRectifiedPhotos') }}" method="POST" class="flex flex-col bg-white px-2 sm:px-20"
        enctype="multipart/form-data">
        @csrf
        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
            <input type="hidden" name="applicant_id" value="{{ $applicant->id }}">
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

            <div class="mt-8 flex items-center gap-x-4">
                <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">CARNET</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>
            <ul role="list"
                class="mt-6 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
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
            <ul role="list" class="mt-6 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600">
                <li class="flex gap-x-3">
                    <x-icons.check />
                    Asegúrate de que la imagen del esté completamente legible y sin reflejos para evitar
                    problemas al verificar la información.
                </li>
            </ul>

            <div class="mt-8">
                <div class="flow-root">
                    <div
                        class="mt-6 grid gap-x-6 gap-y-10 grid-cols-1 {{ $numberPhotos == 3 ? 'lg:grid-cols-3' : 'sm:grid-cols-2' }} xl:gap-x-8 justify-items-center">
                        @foreach ($observedPhotos as $photo)
                            <div class="group relative flex flex-col items-center justify-center">
                                <div
                                    class="relative aspect-h-1 aspect-w-1 w-40 overflow-hidden rounded-md bg-gray-200 lg:aspect-none lg:h-60">
                                    <div class="h-full w-full flex items-center">
                                        @if ($photo['indicator'] == 0)
                                            <img src="{{ asset($photo['url']) }}" alt=""
                                                class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                        @else
                                            <img src="{{ asset('recursos/dni-anverso.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-red-500 text-9xl">X</div>
                                    </div>
                                </div>

                                <label class="block mt-4">
                                    <span
                                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                                        Foto {{ $photo['indicator'] == 0 ? '' : 'DNI' }} {{ $photo['name'] }}
                                    </span>
                                    <input type="file" wire:model="photo.{{ $photo['name'] }}"
                                        name="photo.{{ $photo['name'] }}"
                                        wire:click="$set('photo.{{ $photo['name'] }}', '')"
                                        class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-ms file:font-semibold
                              file:bg-blue-50 file:text-blue-700
                              hover:file:bg-blue-100
                            " />
                                    <x-input-error for="photo.{{ $photo['name'] }}" />
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <input type="hidden" name="number_photos" value="{{ $numberPhotos }}">
        </div>

        <div class="border-t border-gray-200 px-4 py-6 sm:px-20">
            <div class="mt-6 flex justify-end">
                @if ($disabled || !$errors->isEmpty())
                    <button type="button" wire:click="store"
                        class="rounded-md border border-transparent px-6 py-3 text-base font-medium bg-indigo-500 text-gray-200 border-slate-200 shadow-none">Rectificar
                        Fotos</button>
                @else
                    <button type="submit"
                        class="rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Rectificar
                        Fotos</button>
                @endif
            </div>
        </div>
    </form>
</div>
