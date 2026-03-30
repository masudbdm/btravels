<?php

namespace Cp\Team;

use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
{
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages


    public function boot()
    {
        //routes.php
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/teamRoutes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/team')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/team', 'team');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'team');
        }


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');



        $this->loadTranslationsFrom(__DIR__ . '/lang', 'team');

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
        $this->app->make('Cp\Team\Controllers\TeamController');
        $this->app->make('Cp\Team\Controllers\AdminTeamController');


        //config
        $this->mergeConfigFrom(__DIR__ . '/config/team.php', 'team');
    }
}
