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

    {{-- <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8 justify-items-center">
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
                <input type="file" wire:model="frontDniPhoto" wire:click="$set('frontDniPhoto', null)"
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
                    <img src="{{ asset('recursos/dni-reverso.jpg') }}" alt="Front of men&#039;s Basic Tee in black.">
                </div>
            </div>
            <label class="block mt-4">
                <span
                    class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                    Foto DNI Reverso
                </span>
                <input type="file" wire:model="reverseDniPhoto" wire:click="$set('reverseDniPhoto', null)"
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

    </div> --}}
</body>

</html>
