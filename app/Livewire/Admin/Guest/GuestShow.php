<?php

namespace App\Livewire\Admin\Guest;

use App\Models\Guest;
use Livewire\Component;

class GuestShow extends Component
{
    public Guest $guest;

    public function render()
    {
        return view('livewire.admin.guest.guest-show');
    }

    public function mount($guest)
    {
        $this->guest = $guest;
    }
}
