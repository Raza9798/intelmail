<?php

namespace Rapidrx\Intelmail;

use Illuminate\Support\ServiceProvider;

class IntelMailServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__ . '/Mail', 'IntelMail');
    }
}
