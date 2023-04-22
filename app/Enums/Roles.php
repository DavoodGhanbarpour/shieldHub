<?php
namespace App\Enums;
enum Roles: string {
    case ADMIN = 'admin';
    case CUSTOMER = 'customer';


    public function label(): string {
        return static::getLabel($this);
    }

    public static function getLabel(self $value): string {
        return match ($value) {
            Roles::ADMIN => 'Admin',
            Roles::CUSTOMER => 'Customer',
        };
    }
}
