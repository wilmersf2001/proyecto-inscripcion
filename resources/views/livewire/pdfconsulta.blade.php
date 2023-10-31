<div class="flex items-center justify-center h-4/5 mt-10">
    <form action="{{ route('Pdfconsulta.pdfData') }}" method="POST"
        class="max-w-2xl rounded-3xl ring-1 ring-gray-200">
        @csrf
        <div class="bg-gray-50 p-6 text-center ring-1 ring-inset ring-gray-900/5">

            <div class="mb-6">

                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900 text-left">
                        Número de DNI
                    </span>

                    <input type="text" name="dni" wire:model="dni" minlength="8" maxlength="8"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 75635..." />
                    <x-input-error for="dni" />
                </label>
            </div>

            <div class="mb-6">
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900 text-left">
                        Número de Voucher
                    </span>

                    <input type="text" name="voucherNumber" wire:model="voucherNumber" minlength="7" maxlength="7"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 1742..." />
                    <x-input-error for="voucherNumber" />
                </label>
            </div>

            <button type="submit"
                class="block w-full rounded-md bg-green-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">CONSULTAR</button>

                <p class="mt-6 text-sm text-gray-700 leading-6 font-sans-serif text-left">
                    RECUERDA:<br><strong>El horario de recojo de carné de postulante es:</strong><br>Lunes a Viernes de 08:00 am a 1:30 pm y de 03:30 p.m. a <br>06:00 p.m.
                    <br>En la Oficina de Tecnologías de la Información.
                </p>

            @if ($alertpdf)
              <x-alert />
              @endif
        </div>
    </form>
</div>


