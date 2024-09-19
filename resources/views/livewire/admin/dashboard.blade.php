<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        
    <div
        class="w-full overflow-hidden border border-dashed rounded-lg h-100 bg-pink- bg-gradient-to-br from-white to-zinc-50 border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
        <div class="px-10 py-5 text-center">
            <x-ui.countdown target-date="2024-12-25 12:00:00" />
            <small class="text-sm text-gray-500">
                {{ $message }}
            </small>
        </div>
    </div>


</div>
