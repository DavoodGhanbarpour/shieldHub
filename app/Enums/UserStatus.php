<?php

namespace App\Enums;

enum UserStatus: string
{
    case ENABLED = '1';
    case DISABLED = '0';

    public function label(): string
    {
        return UserStatus::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            UserStatus::ENABLED => 'Enabled',
            UserStatus::DISABLED => 'Disabled',
        };
    }

    public static function toCSV()
    {
        return implode(',',[
            UserStatus::ENABLED->value,
            UserStatus::DISABLED->value,
        ]);
    }
}
