@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'type' => 'text',
    'prepend' => null,
    'required' => false,
])

@php
    $wireModel = $attributes->get('wire:model');
@endphp

<div>
    @if($label)
        <label for="{{ $id ?? '' }}" class="block text-sm font-medium leading-5 text-gray-700 dark:text-gray-300">
            {{ $label }}
            @if($required)
                <span class="ml-1 text-red-500">*</span>
            @endif
        </label>
    @endif

    <div data-model="{{ $wireModel }}" class="mt-1.5 rounded-md shadow-sm">
        <div class="relative flex items-stretch w-full">
            @if($prepend)
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                        {{ $prepend }}
                    </span>
                </div>
            @endif
            <input
                {{ $attributes->whereStartsWith('wire:model') }}
                id="{{ $id ?? '' }}"
                name="{{ $name ?? '' }}"
                type="{{ $type ?? '' }}"
                @if($required) required @endif
                autofocus
                class="appearance-none flex w-full h-10 {{ $prepend ? 'pl-7' : 'px-3' }} py-2 text-sm bg-white dark:text-gray-300 dark:bg-white/[4%] border rounded-md border-gray-300 dark:border-white/10 ring-offset-background placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-gray-300 dark:focus:border-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200/60 dark:focus:ring-white/20 disabled:cursor-not-allowed disabled:opacity-50 @error($wireModel) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"
            />
        </div>
    </div>

    @error($wireModel)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>