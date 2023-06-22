<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InboundRepository
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

}
