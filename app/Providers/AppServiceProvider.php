<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Override storage path ke /tmp jika berjalan di Vercel
        if (getenv('APP_STORAGE')) {
            $this->app->useStoragePath(getenv('APP_STORAGE'));
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
