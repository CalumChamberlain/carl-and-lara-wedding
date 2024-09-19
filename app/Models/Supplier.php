<?php

namespace App\Models;

use App\Enums\SupplierTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Supplier extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'type' => SupplierTypes::class,
        ];
    }

    public function notes(): MorphMany
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }

    public function getPhoneLinkAttribute(): string
    {
        return 'tel:'.$this->phone_number;
    }

    public function getEmailLinkAttribute(): string
    {
        return 'mailto:'.$this->email;
    }

    public function getTotalPaidAttribute(): float
    {
        return (float) once(fn () => $this->payments->sum('amount'));
    }

    public function getRemainingCostAttribute(): float
    {
        return $this->price - $this->total_paid;
    }
}
