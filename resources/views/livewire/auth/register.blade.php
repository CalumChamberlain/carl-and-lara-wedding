<div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <x-ui.link href="{{ route('home') }}">
            <x-ui.logo class="w-auto h-10 mx-auto" />
        </x-ui.link>
        <h2 class="mt-5 text-2xl font-extrabold leading-9 text-center text-gray-800 dark:text-gray-200">Create a new
            account</h2>
        <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5">
            <span>Or</span>
            <x-ui.text-link href="{{ route('login') }}">sign in to your account</x-ui.text-link>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div
            class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white dark:sm:bg-gray-950/50 dark:border-gray-200/10 sm:border sm:rounded-lg border-gray-200/60">
            <form wire:submit="register" class="space-y-6">
                <x-ui.input label="Name" type="text" id="name" name="name" wire:model="name" />
                <x-ui.input label="Email address" type="email" id="email" name="email" wire:model="email" />
                <x-ui.input label="Password" type="password" id="password" name="password" wire:model="password" />
                <x-ui.input label="Confirm Password" type="password" id="password_confirmation"
                    name="password_confirmation" wire:model="passwordConfirmation" />
                <x-ui.button type="primary" rounded="md" submit="true">Register</x-ui.button>
            </form>
        </div>
    </div>

</div>
