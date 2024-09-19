<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create supplier') }}
        </h2>
    </x-slot>
    <div>
        <form wire:submit.prevent="create" class="space-y-6">
            <x-ui.input class="my-2" label="Name" name="name" wire:model="name" />
            <x-ui.select class="my-2" label="Type" name="type" wire:model="type" :options="App\Enums\SupplierTypes::labels()" />
            <x-ui.input class="my-2" label="Price" name="price" wire:model="price" prepend="£" />
            <x-ui.input class="my-2" label="Phone number" name="phone_number" wire:model="phone_number" />
            <x-ui.input class="my-2" label="Email" name="email" wire:model="email" />

            <div class="flex justify-end mt-4">
                <x-ui.button wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create supplier') }}
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
