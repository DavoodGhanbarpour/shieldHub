<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:su';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user with admin privileges';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email      = 'test@test.com';
        $password   = 'password';

        $this->checkIfUserExistBefore($email);
        $user       = User::create([
            'name' => 'test',
            'family' => 'test',
            'email' => $email,
            'password' => Hash::make($password)
        ]);


        $this->table(
            ['Email', 'Password'],
            [
                [
                    'Email' => $user->email,
                    'Password' => $password,
                ]
            ]
        );
    }

    private function checkIfUserExistBefore($email)
    {
        if(User::where('email',$email)->first()){
            $this->error('User exists!');die;
        }
    }
}
