<div>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex flex-col text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $this->supplier->name }}
                <span class="text-sm text-gray-500">{{ $this->supplier->type->label() }}</span>
            </h2>
            <div class="ml-auto">
                <x-ui.button tag="a" href="{{ route('admin.supplier.edit', $this->supplier) }}" variant="primary"
                    wire:click="create">
                    {{ __('Edit supplier') }}
                </x-ui.button>
            </div>
        </div>
    </x-slot>
    <div class="flex flex-col items-stretch flex-1 gap-4 md:flex-row h-100">
        <div class="w-full md:w-1/2">
            <x-ui.h2 class="mb-2">
                {{ __('Notes') }}
            </x-ui.h2>
            <div
                class="w-full overflow-hidden border border-dashed rounded-lg h-100 bg-pink- bg-gradient-to-br from-white to-zinc-50 border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
                <div class="px-10 py-5">

                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2">
            <livewire:admin.supplier-payments :supplier="$this->supplier" />
        </div>
    </div>
</div>
