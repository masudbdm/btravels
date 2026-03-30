<?php

namespace Cp\Tour;

use Illuminate\Support\ServiceProvider;

class TourServiceProvider extends ServiceProvider
{
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages


    public function boot()
    {
        //routes.php
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/tourRoutes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/tour')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/tour', 'tour');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'tour');
        }


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');



        $this->loadTranslationsFrom(__DIR__ . '/lang', 'tour');

        // $this->publishes([
        //     __DIR__.'/lang' => $this->app->langPath('vendor/menupage'),
        // ]);


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //controller
        $this->app->make('Cp\Tour\Controllers\TourController');
        $this->app->make('Cp\Tour\Controllers\AdminTourController');


        //config
        $this->mergeConfigFrom(__DIR__ . '/config/tour.php', 'tour');
    }
}
