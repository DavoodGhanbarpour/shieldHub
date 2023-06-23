<?php

namespace App\Providers;

use App\View\Composers\InboundComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
//        View::composer('admin.pages.users.index', InboundComposer::class);
//        View::composer('admin.pages.inbounds.index', InboundComposer::class);
    }
}
