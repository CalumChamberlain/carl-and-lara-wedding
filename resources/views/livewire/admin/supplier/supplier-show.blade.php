<div>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $this->supplier->name }}
            </h2>
            <div class="ml-auto">
                <x-ui.button tag="a" href="{{ route('admin.supplier.create') }}" variant="primary"
                    wire:click="create">
                    {{ __('Edit supplier') }}
                </x-ui.button>
            </div>
        </div>
    </x-slot>
    <div class="flex sm:flex-col sm:gap-4 sm:items-center">
    </div>
</div>
