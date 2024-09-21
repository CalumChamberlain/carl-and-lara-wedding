<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $weddingDate;

    public $weddingVenue;

    public function render()
    {
        return view('livewire.admin.settings');
    }

    public function mount()
    {
        $this->weddingDate = Setting::find('wedding_date');
        $this->weddingVenue = Setting::find('wedding_venue');
    }

    public function updateWeddingSettings()
    {
        $this->validate([
            'weddingDate' => ['required', 'date'],
            'weddingVenue' => ['required'],
        ]);

        Setting::updateOrCreate([
            'key' => 'wedding_date',
        ], [
            'value' => $this->weddingDate,
        ]);

        Setting::updateOrCreate([
            'key' => 'wedding_venue',

        ], [
            'value' => $this->weddingVenue,
        ]);

        $this->dispatch('toast', message: 'Wedding settings updated successfully.', data: ['position' => 'top-right', 'type' => 'success']);

    }
}
