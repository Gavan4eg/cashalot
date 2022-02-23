<?php

namespace Gavan4eg\Cashalot\Providers;

use Illuminate\Support\ServiceProvider;

class CashalotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/cashalot.php' => config_path('cashalot.php')
        ]);
    }
}
