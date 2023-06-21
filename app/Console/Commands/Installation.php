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
        $bar = $this->output->createProgressBar(4);
        $bar->start();

        $this->setConfigs();
        $bar->advance();

        $this->makeMigration();
        $bar->advance();

        $credential = $this->makeDefaultUsers();
        $bar->advance();

        $this->seedDatabase();
        $bar->advance();


        $bar->finish();

        $this->newLine();
        $this->info('Installed successfully!');
        $this->table(['Email', 'Password', 'Role'], $credential);
    }

    private function setConfigs(): void
    {

        $source = base_path().DIRECTORY_SEPARATOR.'.env.example';
        $destination = base_path().DIRECTORY_SEPARATOR.'.env';
        if (! file_exists($destination)) {
            copy($source, $destination);
        }
        if (! env('APP_KEY')) {
            Artisan::call('key:generate');
        }
    }

    private function makeMigration()
    {
        $this->call('migrate');
    }

    private function seedDatabase()
    {
        $this->call('db:seed');
    }

    private function makeDefaultUsers(): array
    {
        $password = 'password';

        if (! $this->checkIfUserExistBefore('test@test.com')) {
            User::create([
                'name' => 'test',
                'email' => 'test@test.com',
                'role' => User::ADMIN,
                'password' => Hash::make($password),
            ]);
        }

        if (! $this->checkIfUserExistBefore('test2@test.com')) {
            User::create([
                'name' => 'test2',
                'email' => 'test2@test.com',
                'role' => User::CUSTOMER,
                'password' => Hash::make($password),
            ]);
        }

        return [
            [
                'Email' => 'test@test.com',
                'Password' => $password,
                'Role' => User::ADMIN,
            ],
            [
                'Email' => 'test2@test.com',
                'Password' => $password,
                'Role' => User::CUSTOMER,
            ],
        ];
    }

    private function checkIfUserExistBefore($email): bool
    {
        if (User::where('email', $email)->first()) {
            return true;
        }

        return false;
    }

    private function wait()
    {
        sleep(1);
    }
}
