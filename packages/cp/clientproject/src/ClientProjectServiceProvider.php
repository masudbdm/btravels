<?php

namespace Cp\ClientProject;

use Illuminate\Support\ServiceProvider;

class ClientProjectServiceProvider extends ServiceProvider
{
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages


    public function boot()
    {
        //routes.php
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/clientProjectRoutes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/clientproject')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/clientproject', 'clientproject');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'clientproject');
        }


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');



        $this->loadTranslationsFrom(__DIR__ . '/lang', 'clientproject');

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
        $this->app->make('Cp\ClientProject\Controllers\ClientProjectController');
        $this->app->make('Cp\ClientProject\Controllers\AdminClientProjectController');


        //config
        $this->mergeConfigFrom(__DIR__ . '/config/clientproject.php', 'clientproject');
    }
}
