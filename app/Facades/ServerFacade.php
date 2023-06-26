<?php

namespace App\Facades;

use App\Models\User;
use Illuminate\Support\Facades\Facade;

/**
 */
class ServerFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'ServerFacade';
    }
}
