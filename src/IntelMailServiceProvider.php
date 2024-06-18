<?php

namespace Intelrx\Intelmail;

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
        if ($this->app->runningInConsole()) {
            // new IntelMailController();
        }
    }
}
