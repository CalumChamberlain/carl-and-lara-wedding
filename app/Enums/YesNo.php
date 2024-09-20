<?php

namespace App\Enums;

enum YesNo: int
{
    case No = 0;
    case Yes = 1;

    public static function labels(): array
    {
        return [
            self::No->value => 'No',
            self::Yes->value => 'Yes',
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
