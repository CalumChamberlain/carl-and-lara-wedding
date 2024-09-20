<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $weddingDate;

    public $weddingVenue;

    public $addressLineOne;

    public $addressLineTwo;

    public $town;

    public $county;

    public $postcode;

    public function render()
    {
        return view('livewire.admin.settings');
    }

    public function mount()
    {
        $this->weddingDate = Setting::find('wedding_date');
        $this->weddingVenue = Setting::find('wedding_venue');
        $address = Setting::find('wedding_venue_address');
        if (! $address) {
            $address = [
                'address_1' => '',
                'address_2' => '',
                'town' => '',
                'county' => '',
                'postcode' => '',
            ];
        }
        $this->addressLineOne = $address['address_1'];
        $this->addressLineTwo = $address['address_2'];
        $this->town = $address['town'];
        $this->county = $address['county'];
        $this->postcode = $address['postcode'];
    }

    public function updateWeddingSettings()
    {
        $this->validate([
            'weddingDate' => ['required', 'date'],
            'weddingVenue' => ['required'],
            'addressLineOne' => ['required'],
            'addressLineTwo' => ['nullable'],
            'town' => ['required'],
            'county' => ['required'],
            'postcode' => ['required'],
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

        Setting::updateOrCreate([
            'key' => 'wedding_venue_address',

        ], [
            'value' => [
                'address_1' => $this->addressLineOne,
                'address_2' => $this->addressLineTwo,
                'town' => $this->town,
                'county' => $this->county,
                'postcode' => $this->postcode,
            ],
        ]);

        $this->dispatch('toast', message: 'Wedding settings updated successfully.', data: ['position' => 'top-right', 'type' => 'success']);

    }
}
