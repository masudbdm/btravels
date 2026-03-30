<?php

namespace App\Providers;

use Cp\BlogPost\Models\BlogPost;
use Cp\Menupage\Models\Menu;
use Cp\Menupage\Models\Page;
use Cp\Product\Models\ProductCategory;
use Cp\Tour\Models\Tour;
use Cp\TourPackage\Models\TourPackage;
use Cp\Testimonial\Models\Testimonial;
use Cp\WebsiteSetting\Models\WebsiteSetting;
use Laravel\Ui\Presets\Bootstrap;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $seconds = 86400; //24 hours

            $headerMenus = cache()->remember('headerMenus', $seconds, function () {
                return Menu::whereActive(true)->orderBy('drag_id')->where('type', 'header_menu')->latest()->get();
            });
            View::share('headerMenus', $headerMenus);


            $footerMenus = cache()->remember('footerMenus', $seconds, function () {
                return Menu::whereActive(true)->orderBy('drag_id')->where('type', 'footer_menu')->latest()->get();
            });
            View::share('footerMenus', $footerMenus);

            $cats = cache()->remember('cats', $seconds, function () {
                return ProductCategory::whereActive(true)->latest()->get();
            });
            View::share('cats', $cats);

            $popular_posts =  cache()->remember('popular_posts', $seconds, function () {
                return BlogPost::orderBy('view_count', 'DESC')->whereActive(true)->whereStatus('published')->take(5)->get();
            });
            View::share('popular_posts', $popular_posts);


            $homePage =  cache()->remember('homePage', $seconds, function () {
                return Page::whereActive(true)->where('id', 1)->first();
            });
            View::share('homePage', $homePage);


            $contactUsPage =  cache()->remember('contactUsPage', $seconds, function () {
                return Page::whereActive(true)->where('id', 2)->first();
            });
            View::share('contactUsPage', $contactUsPage);


            $umrah_tour_packagess =  cache()->remember('umrah_tour_packagess', $seconds, function () {
                return TourPackage::whereActive(true)->where('package_type', 'umrah')->orderBy('drag_id')->get();
            });

            View::share('umrah_tour_packagess', $umrah_tour_packagess);

            $hajj_tour_packagess =  cache()->remember('hajj_tour_packagess', $seconds, function () {
                return TourPackage::whereActive(true)->where('package_type', 'hajj')->orderBy('drag_id')->get();
            });
            View::share('hajj_tour_packagess', $hajj_tour_packagess);


            $ws =  cache()->remember('ws', $seconds, function () {
                return WebsiteSetting::first();
            });
            View::share('ws', $ws);

            $testimonials =  cache()->remember('testimonial', $seconds, function () {
                return Testimonial::where('active', 1)->get();
            });
            View::share('testimonials', $testimonials);

            $testimonials =  cache()->remember('tours', $seconds, function () {
                return Tour::whereActive(true)->latest()->take(3)->get();
            });
            View::share('tours', $testimonials);

               
        });

        paginator::useBootstrap();
    }
}
