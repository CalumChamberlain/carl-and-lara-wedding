<?php

namespace App\Models;

use App\Observers\PartyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[ObservedBy(PartyObserver::class)]
class Party extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    public function note(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}
