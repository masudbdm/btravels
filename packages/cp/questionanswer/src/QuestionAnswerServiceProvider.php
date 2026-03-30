<?php

namespace Cp\QuestionAnswer;

use Illuminate\Support\ServiceProvider;

class QuestionAnswerServiceProvider extends ServiceProvider
{
    //https://github.com/gocanto/gocanto-pkg
    //https://laravel.com/docs/5.2/packages
    //http://stackoverflow.com/questions/19133020/using-models-on-packages


    public function boot()
    {
        //routes.php
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/questionAnswerRoutes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/questionanswer')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/questionanswer', 'questionanswer');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'questionanswer');
        }


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');



        $this->loadTranslationsFrom(__DIR__ . '/lang', 'questionanswer');

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
        $this->app->make('Cp\QuestionAnswer\Controllers\QuestionAnswerController');
        $this->app->make('Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController');


        //config
        $this->mergeConfigFrom(__DIR__ . '/config/questionanswer.php', 'questionanswer');
    }
}