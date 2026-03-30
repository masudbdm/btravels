<?php

namespace Cp\Testimonial;

use Illuminate\Support\ServiceProvider;

class TestimonialServiceProvider extends ServiceProvider
{
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages


    public function boot()
    {
        //routes.php
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/testimonialRoutes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/testimonial')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/testimonial', 'testimonial');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'testimonial');
        }


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');



        $this->loadTranslationsFrom(__DIR__ . '/lang', 'testimonial');

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
        $this->app->make('Cp\Testimonial\Controllers\TestimonialController');
        $this->app->make('Cp\Testimonial\Controllers\AdminTestimonialController');


        //config
        $this->mergeConfigFrom(__DIR__ . '/config/testimonial.php', 'testimonial');
    }
}
