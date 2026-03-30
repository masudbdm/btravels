<?php

namespace Cp\Gallery;

use Illuminate\Support\ServiceProvider;

class GalleryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/galleryRoutes.php';
        }

        if (is_dir(base_path() . '/resources/views/cp/gallery')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/gallery', 'gallery');
        } else {
            $this->loadViewsFrom(__DIR__ . '/views', 'gallery');
        }

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'gallery');
    }

    public function register()
    {
        $this->app->make('Cp\Gallery\Controllers\GalleryController');
        $this->app->make('Cp\Gallery\Controllers\AdminGalleryController');

        $this->mergeConfigFrom(__DIR__ . '/config/gallery.php', 'gallery');
    }
}

