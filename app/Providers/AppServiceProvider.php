<?php

namespace App\Providers;

use App\Helpers\Telegram;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Telegram::class, function ($app) {
            return new Telegram();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
