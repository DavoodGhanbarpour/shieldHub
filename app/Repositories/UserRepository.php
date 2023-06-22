<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function upsert(array $information, int $id = null): User
    {
        if (isset($information['password'])) {
            $information['password'] = Hash::make($information['password']);
        }

        if (isset($id)) {
            return User::where('id', '=', $id)->update($information);
        }

        return User::create($information);
    }

    public function delete(int $id)
    {
        return User::where('id', '=', $id)->delete();
    }

    public function UserShouldBeAdmin()
    {

    }

    public function UserShouldBeCustomer()
    {

    }
}
