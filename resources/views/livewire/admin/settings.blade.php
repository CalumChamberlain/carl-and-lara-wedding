<div>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Settings') }}
            </h2>
        </div>
    </x-slot>
    <div>
        <form wire:submit.prevent="updateWeddingSettings" class="space-y-6">
            <x-ui.input type="date" class="my-2" label="Date" name="date" wire:model="weddingDate" required />
            <x-ui.input class="my-2" label="Venue" name="venue" wire:model="weddingVenue" required />

            <div class="flex justify-end mt-4">
                <x-ui.button wire:click="updateWeddingSettings" wire:loading.attr="disabled">
                    {{ __('Update settings') }}
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
