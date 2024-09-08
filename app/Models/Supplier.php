<?php

namespace App\Models;

use App\Enums\SupplierTypes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Supplier extends Model
{
    use HasFactory, HasUlids;

    protected function casts(): array
    {
        return [
            'type' => SupplierTypes::class,
        ];
    }

    public function note(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }
}
