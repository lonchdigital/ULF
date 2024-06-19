<?php

namespace App\Providers;

use App\Contracts\Page\DynamicPage;
use App\Services\Web\Page\DynamicPageService;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DynamicPage::class, DynamicPageService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
