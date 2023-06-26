<?php

namespace App\Facades;

use App\Models\User;
use Illuminate\Support\Facades\Facade;

/**
 * @method static User upsert(array $information, int $id = null)
 * @method static delete(int $id)
 * @method static User setLocale(string $locale, int $id)
 * @method static User updateLastVisit(int $id, $date = null)
 * @method static bool isEmailUnique(string $email, array $emailsToIgnore = [])
 */
class UserFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'UserFacade';
    }
}
