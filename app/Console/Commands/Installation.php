<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class Installation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install VPN panel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(2);
        $bar->start();

        $this->makeMigration();
        $bar->advance();

        $this->makeDefaultUser();
        $bar->advance();

        $bar->finish();

        $this->newLine();
        $this->info('Installed successfully!');
    }


    private function makeMigration()
    {
        Artisan::call('migrate');
        $this->wait();
    }

    private function makeDefaultUser()
    {
        $email = 'test@test.com';
        $password = 'password';

        if (!$this->checkIfUserExistBefore($email)) {
            User::create([
                'name' => 'test',
                'email' => $email,
                'password' => Hash::make($password)
            ]);
        }
        $this->newLine();
        $this->table(
            ['Email', 'Password'],
            [
                [
                    'Email' => $email,
                    'Password' => $password,
                ]
            ]
        );
        $this->wait();
    }

    private function checkIfUserExistBefore($email): bool
    {
        if (User::where('email', $email)->first()) {
            return true;
        }
        return false;
    }

    private function wait(){
        sleep(1);
    }
}
