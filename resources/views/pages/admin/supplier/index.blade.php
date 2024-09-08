<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>

        <div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($suppliers as $supplier)
                    <x-ui.card title="{{ $supplier->name }}" description="{{ $supplier->description }}"
                        image="{{ $supplier->image }}"></x-ui.card>
                @endforeach
            </div>
            <div class="flex justify-center my-4">
                {{ $suppliers->links() }}
            </div>
        </div>

</x-layouts.app>
    