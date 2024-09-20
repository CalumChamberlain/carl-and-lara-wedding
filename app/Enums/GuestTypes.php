<?php

namespace App\Enums;

enum GuestTypes: int
{
    case Guest = 1;
    case MotherOfTheBride = 2;
    case FatherOfTheBride = 3;
    case MotherOfTheGroom = 4;
    case FatherOfTheGroom = 5;
    case MaidOfHonor = 6;
    case BestMan = 7;
    case Bridesmaid = 8;
    case GroomsMan = 9;
    case Usher = 10;

    public static function labels(): array
    {
        return [
            self::Guest->value => 'Guest',
            self::MotherOfTheBride->value => 'Mother of the bride',
            self::FatherOfTheBride->value => 'Father of the bride',
            self::MotherOfTheGroom->value => 'Mother of the groom',
            self::FatherOfTheGroom->value => 'Father of the groom',
            self::MaidOfHonor->value => 'Maid of honor',
            self::BestMan->value => 'Best man',
            self::Bridesmaid->value => 'Bridesmaid',
            self::GroomsMan->value => 'Groom\'s man',
            self::Usher->value => 'Usher',
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

    public function isWeddingParty(): bool
    {
        return in_array($this->value, [
            self::MotherOfTheBride,
            self::FatherOfTheBride,
            self::MotherOfTheGroom,
            self::FatherOfTheGroom,
            self::MaidOfHonor,
            self::BestMan,
            self::Bridesmaid,
            self::GroomsMan,
            self::Usher,
        ]);
    }
}
