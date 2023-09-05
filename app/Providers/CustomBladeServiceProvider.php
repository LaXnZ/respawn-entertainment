<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomBladeServiceProvider extends ServiceProvider
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
        $this->extendAuthDirective();
    }

    protected function extendAuthDirective()
    {
        Blade::if('auth', function () {
            // Customize the authentication check here
            // For example, you can check for additional conditions or roles
            return auth()->check() && auth()->user()->usertype == 'admin';
        });
    }
}
