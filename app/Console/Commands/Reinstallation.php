<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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
            ['Yes!', 'No'],
            null,
            null,
            false
        );
        if( $choice == 'No' )
            die;

        $bar = $this->output->createProgressBar(2);
        $bar->start();
        Artisan::call('db:wipe');
        $bar->advance();
        Artisan::call('app:install');
        $bar->advance();
        $bar->finish();

        $this->newLine();
        $this->info('Reinstalled successfully!');
    }
}
