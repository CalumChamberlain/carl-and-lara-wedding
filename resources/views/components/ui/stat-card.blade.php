@props(['title', 'stat', 'subtext', 'icon' => null, 'buttonUrl' => null, 'buttonText' => null])

<div class="border shadow rounded-xl bg-card dark:bg-gray-900 dark:text-white">
    <div class="flex flex-row items-center justify-between p-6 pb-2 space-y-0">
        <h3 class="text-sm font-medium tracking-tight dark:text-gray-400">{{ $title }}</h3>
        @if ($icon)
            <x-dynamic-component :component="$icon" class="w-6 h-6 text-muted-foreground" />
        @endif
    </div>
    <div class="p-6 pt-0">
        <div class="text-2xl font-bold dark:text-white">{{ $stat }}</div>
        <p class="text-xs text-muted-foreground dark:text-gray-400">{{ $subtext }}</p>
        @if ($buttonUrl)
            <div class="mt-4">
                <x-ui.button tag="a" :href="$buttonUrl" variant="secondary">
                    {{ $buttonText }}
                </x-ui.button>
            </div>
        @endif
    </div>
</div>
