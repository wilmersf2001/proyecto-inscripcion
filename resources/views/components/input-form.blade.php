@props(['span', 'name', 'model', 'type' => 'text', 'placeholder' => '', 'maxlength' => 255])
<label class="block mb-10">
    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
        {{ $span }}
    </span>
    <input type="{{ $type }}" name="{{ $name }}" wire:model="{{ $model }}"
        placeholder="{{ $placeholder }}" maxlength="{{ $maxlength }}"
        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" />
    <x-input-error for="{{ $model }}" />
</label>