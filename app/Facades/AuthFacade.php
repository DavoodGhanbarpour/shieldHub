<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static authenticate(string $email, string $password, bool $remember = false)
 */
class AuthFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'AuthFacade';
    }
}
