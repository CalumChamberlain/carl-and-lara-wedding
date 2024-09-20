<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if ($id)
                {{ __('Edit guest') . ' - ' . $first_name . ' ' . $last_name }}
            @else
                {{ __('Add guest') }}
            @endif
        </h2>
    </x-slot>
    <div>
        <form wire:submit.prevent="save" class="space-y-6">
            <div>
                <x-ui.h2 class="mb-1">
                    {{ __('Guest Details') }}
                </x-ui.h2>
                <small class="text-sm text-gray-500">
                    {{ __('Fill in the details of the guest. We will never use their email address or phone number, this is just for your information.') }}
                </small>
            </div>
            <x-ui.input class="my-2" label="First name" name="first_name" wire:model="first_name" required />
            <x-ui.input class="my-2" label="Last name" name="last_name" wire:model="last_name" required />
            <x-ui.select class="my-2" label="Type" name="type" wire:model="type" :options="App\Enums\GuestTypes::labels()" required />

            <x-ui.input class="my-2" label="Email" name="email" wire:model="email" />
            <x-ui.input class="my-2" label="Phone number" name="phone_number" wire:model="phone_number" />

            <hr class="my-4 border-gray-200/60" />
            <div>
                <x-ui.h2 class="mb-1">
                    {{ __('Invitation') }}
                </x-ui.h2>
                <small class="text-sm text-gray-500">
                    {{ __('Is this an all-day guest or an evening only guest?') }}
                </small>
            </div>
            {{-- <x-ui.checkbox class="my-2" label="All day" name="all_day" wire:model="all_day" /> --}}
            <x-ui.select class="my-2" label="All day" name="all_day" wire:model="all_day" :options="App\Enums\YesNo::labels()" required />

            <hr class="my-4 border-gray-200/60" />
            <div>
                <x-ui.h2 class="mb-1">
                    {{ __('Attending') }}
                </x-ui.h2>
                <small class="text-sm text-gray-500">
                    {{ __('Is this guest attending the wedding or just a guest?') }}
                </small>
            </div>
            

            <x-ui.select class="my-2" label="Party" name="party_id" wire:model.live="party_id" :options="$this->partyOptions"
                required />

            @if (!$party_id)
                <x-ui.input class="my-2" label="Party name" name="party_name" wire:model="party_name" required />
            @endif

            <div class="flex justify-end mt-4">
                <x-ui.button wire:click="save" wire:loading.attr="disabled">
                    @if ($id)
                        {{ __('Update guest') }}
                    @else
                        {{ __('Add guest') }}
                    @endif
                </x-ui.button>
            </div>
        </form>
    </div>
</div>
