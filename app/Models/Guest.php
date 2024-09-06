<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    public function note(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function party(): BelongsTo
    {
        return $this->belongsTo(Party::class);
    }
}
