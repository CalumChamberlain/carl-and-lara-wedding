<?php

namespace App\Livewire\Admin\Guest;

use App\Models\Guest;
use App\Models\Party;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;

class GuestForm extends Component
{
    public $id;

    public $first_name;

    public $last_name;

    public $type;

    public $email;

    public $phone_number;

    public $all_day;

    public $party_id;

    public $party_name;

    public function render()
    {
        return view('livewire.admin.guest.guest-form');
    }

    public function mount($guest = null)
    {
        if ($guest) {
            $guest = Guest::findOrFail($guest);
            $this->id = $guest->id;
            $this->first_name = $guest->first_name;
            $this->last_name = $guest->last_name;
            $this->type = $guest->type;
            $this->email = $guest->email;
            $this->all_day = $guest->all_day;
            $this->party_id = $guest->party_id;
            $this->party_name = $guest->party->name;
        }
    }

    #[Computed]
    public function partyOptions(): array
    {
        // return all the parties with the first option being id = null and the label being 'Create new party'
        return array_merge([null => 'Create new party'], Party::pluck('name', 'id')->toArray());
    }

    public function save()
    {
        $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'type' => ['required', Rule::enum(\App\Enums\GuestTypes::class)],
            'email' => ['nullable', 'email', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'all_day' => ['nullable', 'boolean'],
            'party_id' => ['nullable', 'exists:parties,id'],
        ]);

        $guest = Guest::updateOrCreate([
            'id' => $this->id,
        ], [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'type' => $this->type,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'all_day' => $this->all_day,
            'party_id' => Party::firstOrCreate(['id' => $this->party_id], ['name' => $this->party_name])->id,
        ]);

        return redirect()->route('admin.guests.index');
    }
}
