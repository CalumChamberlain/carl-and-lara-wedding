<?php

namespace App\Livewire\Admin\Guest;

use App\Models\Guest;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class GuestIndex extends Component
{
    use WithPagination;

    #[Title('Guests')]
    public function render()
    {
        $guests = Guest::paginate();

        return view('livewire.admin.guest.guest-index', compact('guests'));
    }
}
