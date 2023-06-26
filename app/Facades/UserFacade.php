<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static upsert(array $information, int $id = null)
 * @method static delete(int $id)
 * @method static setLocale(string $locale, int $id)
 * @method static updateLastVisit(int $id, $date = null)
 */
class UserFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'UserFacade';
    }
}
