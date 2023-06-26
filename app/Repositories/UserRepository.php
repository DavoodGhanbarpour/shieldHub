<?php

namespace App\Repositories;

use App\Exceptions\NotInSupportedLanguagesListException;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Throwable;

class UserRepository
{
    public function upsert(array $information, int $id = null): User
    {
        if (isset($information['password'])) {
            $information['password'] = Hash::make($information['password']);
        }

        if (isset($id)) {
            $user = User::findOrFail($id);
            $user->update($information);

            return $user;
        }

        return User::create($information);
    }

    public function delete(int $id)
    {
        return User::where('id', '=', $id)->delete();
    }

    /**
     * @throws Throwable
     */
    public function setLocale(string $locale, int $id): User
    {
        throw_if(
            !in_array($locale, array_column(User::SUPPORTED_LANGUAGES, 'key')),
            new NotInSupportedLanguagesListException("Provided language {$locale} is not supported")
        );
        return $this->upsert([
            'locale' => $locale
        ], $id);
    }

    public function updateLastVisit(int $id, $date = null): User
    {
        if (!isset($date)) {
            $date = Carbon::now();
        }
        return $this->upsert([
            'last_visit' => $date
        ], $id);
    }

    public function UserShouldBeAdmin()
    {

    }

    public function UserShouldBeCustomer()
    {

    }
}
