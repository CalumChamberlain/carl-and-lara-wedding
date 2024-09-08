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
            self::Venue => 'Venue',
            self::Photographer => 'Photographer',
            self::Videographer => 'Videographer',
            self::FoodSupplier => 'Food Supplier',
            self::Other => 'Other',
        ];
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
