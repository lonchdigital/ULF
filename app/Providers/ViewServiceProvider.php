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
            'web.layout.index'
        ], \App\ViewComposers\IndexComposer::class);

        View::composer([
            'web.parts.header'
        ], \App\ViewComposers\HeaderComposer::class);

        View::composer([
            'web.parts.footer'
        ], \App\ViewComposers\FooterComposer::class);

        View::composer([
            '*'
        ], \App\ViewComposers\BaseComposer::class);

        View::composer([
            'components.automatch',
        ], \App\ViewComposers\AutomatchComposer::class);
    }
}
