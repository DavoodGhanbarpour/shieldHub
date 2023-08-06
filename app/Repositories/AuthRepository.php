<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function authenticate(string $email, string $password, bool $remember = false): bool
    {
        if (Auth::attemptWhen([
            'email' => $email,
            'password' => $password,
        ],function (User $user){
            return !$user->isDisabled();
        } , $remember)) {
            request()->session()->regenerate();

            return true;
        }

        return false;
    }
}
