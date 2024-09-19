<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if (isset($id) && $id)
                {{ __('Edit payment') }}
            @else
                {{ __('Add payment') }} - {{ $supplier->name }}
            @endif
        </h2>
    </x-slot>
    <div>
        <form wire:submit.prevent="save" class="space-y-6">
            <x-ui.input class="my-2" label="Amount" name="amount" wire:model="amount" prepend="£" required />
            <x-ui.input class="my-2" type="date" label="Date" name="date" wire:model="date" required />
            <x-ui.input class="my-2" label="Reference" name="reference" wire:model="reference" />

            <div class="flex justify-end mt-4">
                <x-ui.button wire:click="save" wire:loading.attr="disabled">
                    @if (isset($id) && $id)
                        {{ __('Update payment') }}
                    @else
                        {{ __('Add payment') }}
                    @endif
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
