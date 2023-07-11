<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // // Factory::guessingFactoryNamesUsing(function (string $modelName){
        // //     return 'Database\\Factories\\'.Arr::last(explode('\\', $modelName)).'Factory';
        // });
      // \Illuminate\Pagination\Paginator::useBootstrapFive();
      // Paginator::useBootstrapFive();
      // Paginator::useBootstrapFour();
    }
}
