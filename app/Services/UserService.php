<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function isEmailUnique(string $email, array $emailsToIgnore = []): bool
    {
        return (bool) User::query()
            ->where('email', '=', $email)
            ->whereNotIn('email', $emailsToIgnore)
            ->count();
    }
}
