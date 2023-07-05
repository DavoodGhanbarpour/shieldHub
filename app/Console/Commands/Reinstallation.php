<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Reinstallation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reinstall VPN panel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $choice = $this->choice(
            'This action will delete database forever, are you sure?',
            ['yes', 'no'],
            1,
            null,
            false
        );
        if ($choice == 'no') {
            exit;
        }

        $this->call('db:wipe');
        $this->call('app:install');

        $this->newLine();
        $this->info('Reinstalled successfully!');
    }
}
