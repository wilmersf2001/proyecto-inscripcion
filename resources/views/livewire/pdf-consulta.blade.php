
<form action={{ route('pdf-consulta.pdfData') }} method="POST"

    <div class="grid md:grid-cols-2 md:gap-6">
        <label class="block mb-6">
            <span
                class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                Número de DNI
            </span>
            <input type="text" name="dni" wire:model="dni" minlength="8" maxlength="8"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Ejem: 75635..." />
            <x-input-error for="dni" />
        </label>
        <label class="block mb-6">
            <span
                class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-gray-900 mr-2">
                Número de voucher
            </span>
            <input type="text" name="voucherNumber" wire:model="voucherNumber" minlength="7" maxlength="7"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Ejem: 1742..." />
            <x-input-error for="voucherNumber" />
        </label>

        <button type="submit"
        class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">INGRESAR</button>

        @if ($alertpdf)
                <x-alert />
            @endif


    </div>
</form>
