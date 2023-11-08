@props(['span', 'name', 'model', 'type' => 'text', 'placeholder' => '', 'maxlength' => 255, 'disable' => 0])
<label class="block mb-10">
    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
        {{ $span }}
    </span>
    @if ($disable == 0)
        <input type="{{ $type }}" name="{{ $name }}" wire:model="{{ $model }}"
            placeholder="{{ $placeholder }}" maxlength="{{ $maxlength }}"
            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
    @else
        <input type="{{ $type }}" name="{{ $name }}" wire:model="{{ $model }}"
            placeholder="{{ $placeholder }}" maxlength="{{ $maxlength }}" disabled
            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block w-full rounded-md sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" />
    @endif
    <x-input-error for="{{ $model }}" />
</label>

{{-- <input type="text" disabled placeholder="Seleccione tipo de colegio"
                            class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 block w-full rounded-md sm:text-sm disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none" /> --}}
