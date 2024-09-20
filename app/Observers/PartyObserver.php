<?php

namespace App\Observers;

use App\Models\Party;
use Illuminate\Support\Arr;

class PartyObserver
{
    /**
     * Handle the Party "creating" event.
     */
    public function creating(Party $party): void
    {
        $characters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '2', '3', '4', '5', '6', '7', '8', '9'];
        do {
            $loginCode = implode(Arr::random($characters, 6));
        } while (Party::where('login_code', $loginCode)->exists());

        $party->login_code = $loginCode;
    }

    /**
     * Handle the Party "created" event.
     */
    public function created(Party $party): void
    {
        //
    }

    /**
     * Handle the Party "updated" event.
     */
    public function updated(Party $party): void
    {
        //
    }

    /**
     * Handle the Party "deleted" event.
     */
    public function deleted(Party $party): void
    {
        //
    }

    /**
     * Handle the Party "restored" event.
     */
    public function restored(Party $party): void
    {
        //
    }

    /**
     * Handle the Party "force deleted" event.
     */
    public function forceDeleted(Party $party): void
    {
        //
    }
}
