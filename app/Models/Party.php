<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Party extends Model
{
    use HasFactory, HasUlids;

    public function note(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}
