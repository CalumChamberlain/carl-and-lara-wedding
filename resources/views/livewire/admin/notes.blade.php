<div>
    <x-ui.h2 class="mb-4">
        {{ __('Notes') }}
    </x-ui.h2>
    <div
        class="w-full overflow-hidden border border-dashed rounded-lg h-100 bg-pink- bg-gradient-to-br from-white to-zinc-50 border-zinc-200 dark:border-gray-700 dark:from-gray-950 dark:via-gray-900 dark:to-gray-800">
        <div class="px-10 py-5">
            @forelse ($this->notes as $note)
                <div class="flex items-center px-4 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $note->note }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $note->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 ml-auto">
                        <x-ui.button size="sm" variant="secondary" wire:click="deleteNote('{{ $note->id }}')"
                            wire:confirm.stop="{{ __('Are you sure you want to delete this note?') }}">
                            {{ __('Delete') }}
                        </x-ui.button>
                    </div>
                </div>
            @empty
                <span class="text-sm text-gray-500">{{ __('No notes yet') }}</span>
            @endforelse
        </div>

    </div>
    <form wire:submit.prevent="addNote" class="mt-4">
        <x-ui.textarea label="Add Note" wire:model="noteInput" class="mt-4" />
        <div class="flex justify-end mt-4">
            <x-ui.button wire:click="addNote" wire:loading.attr="disabled">
                {{ __('Add note') }}
            </x-ui.button>
        </div>
    </form>
</div>
