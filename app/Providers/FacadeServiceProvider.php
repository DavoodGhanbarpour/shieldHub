<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\InboundRepository;
use App\Repositories\ServerRepository;
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
        app()->singleton('AuthFacade', AuthRepository::class);
        app()->singleton('AuthFacade', AuthRepository::class);
        app()->singleton('ServerFacade', ServerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
