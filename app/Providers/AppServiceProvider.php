<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // За прокси (Vercel/CDN) схема запроса теряется — принудительно https в production
        if ($this->app->isProduction()) {
            URL::forceScheme('https');
        }
    }
}
