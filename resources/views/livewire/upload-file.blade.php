<div class="p-10">
    <form method="POST" action={{ route('applicant.uploadFile') }} enctype="multipart/form-data">
        @csrf
        <div class="my-8 flex items-center gap-x-4">
            <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Archivos Requeridos
            </h4>
            <div class="h-px flex-auto bg-gray-100"></div>
        </div>

        <div class="grid md:grid-cols-1 md:gap-6 mb-10">
            <div class="flex items-center justify-center space-x-6">
                <x-icons.user />
                <label class="block">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        Foto Carnet Postulante
                    </span>
                    <input type="file" name="profilePhoto" wire:model="profilePhoto"
                        class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100
              " />
                    <x-input-error for="profilePhoto" />
                </label>
            </div>

        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="flex items-center justify-center space-x-6 mb-10">
                <div class="shrink-0">
                    <img src="{{ asset('images/dni-anverso.png') }}" alt="DNI ANVERSO" width="60" height="60" />
                </div>
                <label class="block">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        DNI Parte Anverso
                    </span>
                    <input type="file" name="reverseDniPhoto" wire:model="reverseDniPhoto"
                        class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100
              " />
                    <x-input-error for="reverseDniPhoto" />
                </label>
            </div>

            <div class="flex items-center justify-center space-x-6 mb-10">
                <div class="shrink-0">
                    <img src="{{ asset('images/dni-reverso.png') }}" alt="DNI REVERSO" width="60" height="60" />
                </div>
                <label class="block">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                        DNI Parte Reverso
                    </span>
                    <input type="file" name="frontDniPhoto" wire:model="frontDniPhoto"
                        class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100
              " />
                    <x-input-error for="frontDniPhoto" />
                </label>
            </div>
        </div>

        <div class="my-8 flex items-center gap-x-4">
            <h4 class="flex-none text-lg font-medium leading-none  text-indigo-600">Declaración Jurada
            </h4>
            <span
                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">IMPORTANTE</span>
            <div class="h-px flex-auto bg-gray-100"></div>
        </div>

        <div class="relative flex gap-x-3">
            <div class="flex h-6 items-center">
                <input id="comments" name="comments" type="checkbox"
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
            </div>
            <div class="text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900">Declaro bajo juramento que:</label>
            </div>
        </div>

        <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:gap-6">
            <li class="flex gap-x-3">
                <x-icons.check />
                Conozco, acepto y me someto a las bases, condiciones y procedimientos establecidos en eI
                Reglamento del Concurso de Admisión 2016-II de la Universidad Nacional
                Pedro Ruiz Gallo.
            </li>
            <li class="flex gap-x-3">
                <x-icons.check />
                La información y fotografia registrada es AUTÉNTICA y que las imágenes de mi DNI enviados para
                mi inscripción como postulante al presente Concurso de Admisión,
                son copia fiel al original, en caso de faltar a la verdad me someto a las sanciones
                correspondientes (Art. 38 del Reglamento del presente Concurso de Admisión).
            </li>
            <li class="flex gap-x-3">
                <x-icons.check />
                No tengo impedimento para participar en eI Concurso de Admisión 2016-11.
            </li>
            <li class="flex gap-x-3">
                <x-icons.check />
                De alcanzar una vacante, me comprometo a regularizar mi expediente en la fecha establecida en el
                cronograma del presente Concurso de Admisión; en caso contrario
                me someto a las sanciones correspondientes (Art.87 del Reglamento del presente Concurso de
                Admisión).
            </li>
        </ul>
        <button type="submit"
            class="cursor-pointer mt-4 text-white bg-blue-600 hover:bg-blue-500 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Enviar
        </button>
    </form>
</div>
