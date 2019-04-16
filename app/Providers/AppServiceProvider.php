<?php

namespace App\Providers;

use App\BackPage\Repositories\OfficeRepo;
use App\BackPage\Repositories\CoreRepo;
use Illuminate\Support\ServiceProvider;
use App\BackPage\Collections\CoreCollection;

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
            
            $repoconf = new CoreRepo();
            $colleconf = new CoreCollection();
            $confdata = $repoconf->findAll(); 
            $config = $colleconf->renderData($confdata);
            
            $view->with(compact('offices', 'config'));
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
