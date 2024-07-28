<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
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
        View::composer([
            'web.parts.footer'
        ], \App\ViewComposers\FooterComposer::class);

        View::composer([
            '*'
        ], \App\ViewComposers\BaseComposer::class);
    }
}
