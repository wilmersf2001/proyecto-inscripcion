<div>
    <form action={{ route('pay.validatePayment') }} method="POST" class="mt-5">
        @csrf
        <p class="text-sm font-medium text-indigo-600 hover:text-indigo-500 mb-8">Validar Pago UNPRG</p>
        <label class="block mb-8">
            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                DNI
            </span>
            <input type="text" name="dni" wire:model.lazy="dni" minlength="8" maxlength="8"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Ejem: 75098..." />
            <x-input-error for="dni" />
        </label>

        <label class="block mb-8">
            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                VOUCHER
            </span>
            <input type="text" name="voucherNumber" wire:model.lazy="voucherNumber" minlength="7" maxlength="7"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Ejem: 1702..." />
            <x-input-error for="voucherNumber" />
        </label>

        <label class="block mb-6">
            <span class="block text-sm font-medium text-slate-700">
              MODALIDAD
            </span>
            <select
              class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
              <option value="disabled select hidden">SELECCIONE MODALIDAD</option>
              @foreach ($modalities as $modalitie)
                <option value={{ $modalitie->modalidad_id }}>
                  {{ $modalitie->modalidad_descripcion }}
                </option>
              @endforeach
            </select>
          </label>

          <label class="block mb-6">
            <span
                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                Seleccione tipo de institucion de procedencia
            </span>
            <select name="tipo_institucion"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1">
                <option value="disabled select hidden">SELECCIONE TIPO DE INSTITUCION</option>
                <option value='1'>Nacional</option>
                <option value='2'>Particular</option>
            </select>
            <x-input-error for="" />
        </label>

        <label class="block mb-8">
            <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                AGENCIA
            </span>
            <input type="text" name="agencia" wire:model="agencia" minlength="4" maxlength="4"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Ejem: 03.." />
            <x-input-error for="agencia" />
        </label>

        <label class="block mb-6">
            <span
                class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
                FECHA DE PAGO
            </span>
            <input type="date" name="fechaNacimiento"
                class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
            <x-input-error for="" />
        </label>


        @if ($errors->any())
        <button type="button" disabled
            class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-400 px-8 py-3 text-base font-medium text-white focus:outline-none focus:ring-2">CONSULTAR</button>
        @else
        <button type="submit"
            class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">CONSULTAR</button>
        @endif
    </form>
</div>
