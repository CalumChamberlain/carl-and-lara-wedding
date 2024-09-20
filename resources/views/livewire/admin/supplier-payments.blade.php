<div>
    <x-ui.h2 class="flex mb-2">
        {{ __('Payment history') }}
        <div class="ml-auto">
            <x-ui.button variant="secondary" tag="a"
                href="{{ route('admin.suppliers.payments.create', $this->supplier) }}">
                {{ __('Add payment') }}
            </x-ui.button>
        </div>
    </x-ui.h2>
    <div
        class="w-full overflow-hidden border border-dashed rounded-lg h-100 bg-pink- bg-gradient-to-br from-white to-zinc-50 border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
        <div class="p-5">
            <div class="flex flex-col gap-4 h-100">
                <div class="flex items-center py-4 border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <dt class="text-sm font-bold">Total paid</dt>
                        <dd class="text-sm">
                            <livewire:admin.sensitive-data :content="Number::currency($this->supplier->total_paid, in: 'GBP')" />
                        </dd>
                    </div>
                    <div class="flex-shrink-0 ml-auto">
                        <dt class="text-sm font-bold">Remaining cost</dt>
                        <dd class="text-sm">
                            <livewire:admin.sensitive-data :content="Number::currency($this->supplier->remaining_cost, in: 'GBP')" />
                        </dd>
                    </div>
                </div>
                @forelse ($this->payments as $payment)
                    <div class="flex items-center px-4 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div>
                                <p class="mt-1 text-sm text-gray-500">
                                    <livewire:admin.sensitive-data :content="Number::currency($payment->amount, in: 'GBP')" />
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $payment->date }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $payment->reference }}
                                </p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ml-auto">
                            <x-ui.button size="sm" variant="secondary"
                                wire:click="deletePayment('{{ $payment->id }}')"
                                wire:confirm.stop="{{ __('Are you sure you want to delete this payment?') }}">
                                {{ __('Delete') }}
                            </x-ui.button>
                        </div>
                    </div>
                @empty
                    <span class="text-sm text-gray-500">{{ __('No payments yet') }}</span>
                @endforelse
            </div>
        </div>
    </div>
</div>
