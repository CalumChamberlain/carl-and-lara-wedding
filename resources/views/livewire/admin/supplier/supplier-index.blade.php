<div>
    <x-slot name="header">
        <div class="flex">
            <div>
                <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ __('Suppliers') }}
                </h2>
                <small class="text-sm text-gray-500">
                    <livewire:admin.sensitive-data :content="$this->totalPaid . ' / ' . $this->totalPrice" />
                </small>
            </div>
            <div class="ml-auto">
                <x-ui.button tag="a" href="{{ route('admin.suppliers.create') }}" variant="primary"
                    wire:click="create">
                    {{ __('Add supplier') }}
                </x-ui.button>
            </div>
        </div>
    </x-slot>
    <div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($suppliers as $supplier)
                <x-ui.card title="{{ $supplier->name }}" image="{{ $supplier->image }}"
                    description="{{ $supplier->type->label() }}">
                    <div class="flex flex-col justify-between">
                        <small class="text-sm text-gray-500">
                            <livewire:admin.sensitive-data :content="Number::currency($supplier->total_paid, in: 'GBP')" /> /
                            <livewire:admin.sensitive-data :content="Number::currency($supplier->price, in: 'GBP')" />
                        </small>
                        <x-slot:footer>
                            <x-ui.button tag="a" :href="route('admin.suppliers.show', $supplier)" variant="secondary">
                                {{ __('View') }}
                            </x-ui.button>
                            <div class="flex justify-between gap-4 mt-4 h-50">
                                @if (isset($supplier->phone_number))
                                    <x-ui.button size="sm" tag="a" :href="$supplier->phone_link" variant="secondary">
                                        <x-lucide-phone width="20" />
                                    </x-ui.button>
                                @endif
                                @if (isset($supplier->email))
                                    <x-ui.button size="sm" tag="a" :href="$supplier->email_link" variant="secondary">
                                        <x-lucide-mail width="20" />
                                    </x-ui.button>
                                @endif
                            </div>
                        </x-slot:footer>
                    </div>
                </x-ui.card>
            @endforeach
        </div>
        <div class="flex justify-center my-4">
            {{ $suppliers->links() }}
        </div>
    </div>
</div>
