<?php

namespace App\Providers;

use App\BackPage\Repositories\OfficeRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('*', function ($view) {
            $repo = new OfficeRepo();
            $offices = $repo->showAllOffices();
            $view->with('offices', $offices);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
