<div>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Guests') }}
            </h2>
            <div class="ml-auto">
                <x-ui.button tag="a" href="{{ route('admin.guests.create') }}" variant="primary" wire:click="create">
                    {{ __('Add guest') }}
                </x-ui.button>
            </div>
        </div>
    </x-slot>
    <div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($guests as $guest)
                <x-ui.card title="{{ $guest->name }}"
                    description="{{ $guest->party->name }} - {{ $guest->type->label() }}">
                    <div class="flex flex-col justify-between">
                        <x-slot:footer>
                            <x-ui.button tag="a" :href="route('admin.guests.show', $guest)" variant="secondary">
                                {{ __('View') }}
                            </x-ui.button>
                        </x-slot:footer>
                    </div>
                </x-ui.card>
            @endforeach
        </div>
        <div class="flex justify-center my-4">
            {{ $guests->links() }}
        </div>
    </div>
</div>
