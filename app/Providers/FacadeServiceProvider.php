<?php

namespace App\Providers;

use App\Repositories\InboundRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('UserFacade', UserRepository::class);
        app()->singleton('InboundFacade', InboundRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
