@props([
    'image' => null,
    'title' => null,
    'description' => null,
    'buttonText' => null,
    'buttonUrl' => '#',
])

<div
    {{ $attributes->merge(['class' => 'rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm flex flex-col h-full dark:sm:bg-gray-950/50 dark:border-gray-200/10']) }}>
    @if ($image)
        <div class="relative">
            <img src="{{ $image }}" class="w-full h-auto" alt="{{ $title }}" />
        </div>
    @endif
    <div class="flex flex-col flex-grow p-7">
        @if ($title)
            <x-ui.h3 class="mb-2">{{ $title }}</x-ui.h3>
        @endif
        @if ($description)
            <p class="mb-5 text-neutral-500">{{ $description }}</p>
        @endif
        <div class="flex-grow">
            {{ $slot }}
        </div>
        @if ($buttonText)
            <a href="{{ $buttonUrl }}"
                class="inline-flex items-center justify-center w-full h-10 px-4 py-2 mt-5 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                {{ $buttonText }}
            </a>
        @endif
    </div>
    @if (isset($footer))
        <div class="mt-auto border-t p-7 border-neutral-200/60">
            {{ $footer }}
        </div>
    @endif
</div>