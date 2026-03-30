<?php

namespace Cp\tourPackage;

use Illuminate\Support\ServiceProvider;

class TourPackageServiceProvider extends ServiceProvider
{
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages


    public function boot()
    {
        //routes.php
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/tourPackageRoutes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/tourpackage')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/tourpackage', 'tourpackage');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'tourpackage');
        }


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');



        $this->loadTranslationsFrom(__DIR__ . '/lang', 'tourpackage');




    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //controller
        $this->app->make('Cp\TourPackage\Controllers\TourPackageController');
        $this->app->make('Cp\TourPackage\Controllers\AdminTourPackageController');


        //config
        $this->mergeConfigFrom(__DIR__ . '/config/tourpackage.php', 'tourpackage');
    }
}
