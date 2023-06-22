<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class InboundFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'InboundFacade';
    }
}
