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
        $bar = $this->output->createProgressBar(3);
        $bar->start();

        $this->setConfigs();
        $bar->advance();

        $this->makeMigration();
        $bar->advance();

        $credential = $this->makeDefaultUser();
        $bar->advance();

        $bar->finish();

        $this->newLine();
        $this->info('Installed successfully!');
        $this->table(['Email', 'Password'], [[
            'Email' => $credential['email'],
            'Password' => $credential['password'],
        ]]);
    }

    private function setConfigs(): void
    {

        $source = base_path(). DIRECTORY_SEPARATOR . ".env.example";
        $destination = base_path(). DIRECTORY_SEPARATOR . ".env";
        if( !file_exists($destination) ){
            copy($source,$destination);
        }
        if( !env('APP_KEY') ){
            Artisan::call('key:generate');
        }
    }

    private function makeMigration()
    {
        $this->call('migrate');
    }

    private function makeDefaultUser() : array
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
        return [
            'email' => $email,
            'password' => $password
        ];
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
