<div>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div
        class="border shadow rounded-xl bg-card dark:bg-gray-900 dark:text-white">
        <div class="px-10 py-5 text-center dark:text-gray-400">
            <x-ui.countdown :target-date="App\Models\Setting::find('wedding_date') ?? Carbon\Carbon::now()->format('Y-m-d')" class="w-full" />
            @if (App\Models\Setting::find('wedding_date') == null)
                <x-ui.button tag="a" href="{{ route('admin.settings') }}" variant="secondary" class="w-full">
                    {{ __('Set wedding date') }}
                </x-ui.button>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <x-ui.stat-card 
            title="Total Suppliers" 
            :stat="$this->supplierCount"
            :subtext="$this->supplierStatMessage"
            icon="lucide-briefcase-business"
            :button-url="$this->supplierCount == 0 ? route('admin.suppliers.create') : route('admin.suppliers.index')"
            :button-text="$this->supplierCount == 0 ? 'Add supplier' : 'View suppliers'"
            />
        <x-ui.stat-card 
            title="Total Guests" 
            :stat="$this->guestCount"
            :subtext="$this->guestStatMessage"
            icon="lucide-users"
            :button-url="$this->guestCount == 0 ? route('admin.guests.create') : route('admin.guests.index')"
            :button-text="$this->guestCount == 0 ? 'Add guest' : 'View guests'"
            />
    </div>


</div>
