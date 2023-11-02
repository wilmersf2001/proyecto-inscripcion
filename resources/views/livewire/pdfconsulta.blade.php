<div class="flex items-center justify-center h-4/5 mt-10 ">
    <form action="{{ route('Pdfconsulta.pdfData') }}" method="POST"
        class="max-w-2xl rounded-3xl ring-1 ring-gray-200">
        @csrf

        <div class="bg-gray-50 p-6 text-center ring-1 ring-inset ring-gray-900/5 rounded-lg">
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


              @if($alertpdf)
              <div class="alert absolute bottom-0 left-1/2 transform -translate-x-1/2 w-72">
                <div class="flex items-center p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
                    <div
                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div class="ml-3 text-sm text-gray-600">Los campos no coinciden. Por favor intente de nuevo</div>
                </div>
            </div>
              @endif

        </div>
    </form>
</div>






