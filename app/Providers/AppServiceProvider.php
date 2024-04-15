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
        $this->app->bind('App\Contracts\EmailInterface', 'App\Services\EmailService');
        $this->app->bind('App\Contracts\MessageHandlerInterface', 'App\Services\EmailServiceMessageHandler');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
