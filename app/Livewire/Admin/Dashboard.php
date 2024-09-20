<?php

namespace App\Livewire\Admin;

use App\Models\Guest;
use App\Models\Supplier;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard');
    }

    #[Computed]
    public function supplierCount(): int
    {
        return Supplier::count();
    }

    #[Computed]
    public function guestCount(): int
    {
        return Guest::count();
    }

    #[Computed]
    public function supplierStatMessage(): string
    {
        if ($this->supplierCount == 0) {
            return 'Let\'s get started by adding a supplier!';
        }

        return 'The experts making your day special!';
    }

    #[Computed]
    public function guestStatMessage(): string
    {
        if ($this->guestCount == 0) {
            return 'Let\'s get started by adding a guest!';
        }

        return 'Celebrate with the people you love';
    }
}
