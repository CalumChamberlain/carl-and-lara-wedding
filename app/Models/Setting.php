<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    // public function getValueAttribute($value)
    // {
    //     $string = Str::of($value);

    //     return $string->isJson() ? json_decode($string, true) : $value;
    // }

    public function value(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $string = Str::of($value);

                return $string->isJson() ? json_decode($string, true) : $value;
            },
            set: function ($value) {
                is_array($value) ? $value = json_encode($value) : $value;

                return $value;
            }
        );
    }
}
