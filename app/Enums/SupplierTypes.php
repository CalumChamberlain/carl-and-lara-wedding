<?php

namespace App\Enums;

enum SupplierTypes: int
{
    case Venue = 1;
    case Photographer = 2;
    case Videographer = 3;
    case FoodSupplier = 4;
    case Other = 5;

    public static function labels(): array
    {
        return [
            self::Venue->value => 'Venue',
            self::Photographer->value => 'Photographer',
            self::Videographer->value => 'Videographer',
            self::FoodSupplier->value => 'Food Supplier',
            self::Other->value => 'Other',
        ];
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return self::labels()[$this->value];
    }
}
