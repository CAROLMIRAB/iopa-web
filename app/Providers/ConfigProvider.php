<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (isset($_SERVER['HTTP_HOST'])) 
        {
            
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
