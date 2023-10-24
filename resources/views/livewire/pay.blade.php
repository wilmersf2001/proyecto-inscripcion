<div>
    <form action={{ route('pay.validatePayment') }} method="POST"
        class="mx-auto max-w-2xl rounded-3xl ring-1 ring-gray-200 lg:mx-0 lg:flex lg:max-w-none">
        @csrf
        <div class="p-8 sm:p-10 lg:flex-auto">
            <h3 class="text-2xl font-bold tracking-tight text-gray-900">BIENVENIDO POSTULANTE</h3>
            <p class="mt-6 text-base leading-7 text-gray-600 text-justify">Para continuar, asegúrate de haber
                completado el
                pago correspondiente en el Banco de la Nación. Luego, ingresa tus datos del</p>
            <div class="relative">
                <span
                    class="question-trigger inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">voucher</span>
                <x-message-question>
                    <x-slot name="message">
                        <img src="{{ asset('images/voucher_ejemplo.png') }}" alt="UNPRG" width="250"
                            height="250" />
                    </x-slot>
                </x-message-question>
            </div>
            <p class="mt-6 text-base leading-7 text-gray-600 text-justify">para verificar el pago realizado y avanzar en tu proceso de admisión.</p>

            <div class="mt-8 flex items-center gap-x-4 mb-5">
                <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">Información
                    del pago de postulante
                </h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                        DNI
                    </span>
                    <input type="text" name="dni" wire:model.lazy="dni" minlength="8" maxlength="8"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 75635..." />
                    <x-input-error for="dni" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-gray-900 mr-2">
                        Voucher
                    </span>
                    <input type="text" name="voucherNumber" wire:model.lazy="voucherNumber" minlength="7"
                        maxlength="7"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 1742..." />
                    <x-input-error for="voucherNumber" />
                </label>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                        Agencia
                    </span>
                    <input type="text" name="agencyNumber" wire:model.lazy="agencyNumber" minlength="4"
                        maxlength="4"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                        placeholder="Ejem: 0230" />
                    <x-input-error for="agencyNumber" />
                </label>
                <label class="block mb-6">
                    <span
                        class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-xs font-medium text-slate-900">
                        Fecha del pago
                    </span>
                    <input type="date" name="payDay" wire:model.lazy="payDay"
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
                    <x-input-error for="payDay" />
                </label>
            </div>

        </div>
        <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
            <div
                class="h-full rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                <div class="mx-auto max-w-xs px-8">
                    <p class="text-base font-semibold text-gray-600">Pago realizado al</p>
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/logo_bn.png') }}" alt="Banco de la nacion" width="45"
                            height="45" />
                        <p class="ml-4 text-2xl tracking-tight text-gray-600">Banco de la Nación</p>
                    </div>
                    <p class="my-16 flex items-baseline justify-center gap-x-2">
                        <span class="text-5xl font-bold tracking-tight text-gray-900">
                            S/.
                            @if ($amount)
                                {{ $amount }}
                            @else
                                _ _ _
                            @endif
                        </span>
                        <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">PEN</span>
                    </p>
                    @if ($errors->any())
                        <button type="button" disabled
                            class="mt-10 block w-full rounded-md bg-indigo-400 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm">INGRESAR</button>
                    @else
                        <button type="submit"
                            class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">INGRESAR</button>
                    @endif
                    <p class="mt-6 text-xs leading-5 text-gray-600">Continue al ingreso de los datos
                        personales y académicos del postulante</p>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const questionTriggers = document.querySelectorAll(".question-trigger");
            questionTriggers.forEach(function(trigger) {
                trigger.addEventListener("mouseenter", function() {
                    const popover = this.nextElementSibling;
                    popover.style.opacity = "1";
                    popover.style.visibility = "visible";
                });
                trigger.addEventListener("mouseleave", function() {
                    const popover = this.nextElementSibling;
                    popover.style.opacity = "0";
                    popover.style.visibility = "hidden";
                });
            });
        });
    </script>
</div>
