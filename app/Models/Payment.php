<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['amount', 'reference', 'date', 'paid_at'];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'paid_at' => 'datetime',
        ];
    }

    protected $appends = [
        'amount', 'overdue',
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function amount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 100,
            set: fn ($value) => $value * 100
        );
    }

    public function getOverdueAttribute(): bool
    {
        return $this->date < now();
    }

    public function scopePaid(Builder $query): Builder
    {
        return $query->where('paid_at', '<>', null);
    }

    public function scopeNotPaid(Builder $query): Builder
    {
        return $query->where('paid_at', null);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('date', '>=', now());
    }
}
