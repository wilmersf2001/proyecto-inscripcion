@props(['span', 'src', 'alt', 'name', 'model', 'click', 'size' => 80])
<div class="flex items-center justify-center space-x-6">
    <div class="shrink-0">
        <img src="{{ asset($src) }}" alt="{{ $alt }}" width="{{ $size }}" height="{{ $size }}" />
    </div>
    <label class="block">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block mb-2 text-sm font-medium text-gray-900">
            {{ $span }}
        </span>
        <input type="file" name="{{ $name }}" wire:model="{{ $model }}" wire:click="{{ $click }}"
            class="block w-full text-sm text-slate-500
  file:mr-4 file:py-2 file:px-4
  file:rounded-full file:border-0
  file:text-ms file:font-semibold
  file:bg-blue-50 file:text-blue-700
  hover:file:bg-blue-100
" />
        <x-input-error for="{{ $model }}" />
    </label>
</div>
