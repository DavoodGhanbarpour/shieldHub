<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\DashboardRepository;
use App\Repositories\InboundRepository;
use App\Repositories\InvoiceRepository;
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
        app()->singleton('DashboardFacade', DashboardRepository::class);
//        app()->singleton('UserFacade', UserRepository::class);
        app()->singleton('InboundFacade', InboundRepository::class);
        app()->singleton('AuthFacade', AuthRepository::class);
        app()->singleton('ServerFacade', ServerRepository::class);
        app()->singleton('InvoiceFacade', InvoiceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
