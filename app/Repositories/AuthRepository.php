<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function authenticate(string $email, string $password, bool $remember = false): bool
    {
        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
        ], $remember)) {
            request()->session()->regenerate();

            return true;
        }

        return false;
    }
}
