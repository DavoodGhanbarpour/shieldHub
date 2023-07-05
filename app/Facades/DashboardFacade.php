<?php

namespace App\Facades;

use App\Models\User;
use Illuminate\Support\Facades\Facade;

/**
 */
class DashboardFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'DashboardFacade';
    }
}
