<?php
namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function register(array $informations) : User
    {
        return User::create([
            'name' => $informations['name'],
            'email' => $informations['email'],
            'password' => Hash::make($informations['password']),
        ]);
    }

    public function UserShouldBeAdmin()
    {

    }

    public function UserShouldBeCustomer()
    {

    }

}
