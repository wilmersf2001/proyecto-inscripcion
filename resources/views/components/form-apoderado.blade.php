<h2 class="text-base font-semibold leading-7 text-gray-900">Información del Apoderado
</h2>
<p class="mt-1 text-sm leading-6 text-gray-600 mb-4">Usted es menor de edad, por favor
    ingrese los datos de su apoderado.</p>
<div class="relative">
    <input type="search" name="num_documento_apoderado" wire:model="applicant.num_documento_apoderado"
        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-md sm:text-sm focus:ring-1"
        placeholder="Ingrese DNI del apoderado" required>
    <button type="button" wire:click="getApoderadoDataByDni()"
        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
    </button>
</div>
<x-input.error for="applicant.num_documento_apoderado" />
