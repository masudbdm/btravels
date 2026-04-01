<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/clear-cache', function () {
    // Clear application cache
    Artisan::call('cache:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear config cache
    Artisan::call('config:clear');

    // Clear view cache
    Artisan::call('view:clear');

    // Clear optimized class files
    Artisan::call('optimize:clear');

    return redirect()->back();
})->name('clear-cache');



Route::get('/storage', function () {
    Artisan::call('storage:link');
    return redirect()->back();
});

// SEO endpoints
Route::get('/sitemap.xml', [App\Http\Controllers\SeoController::class, 'sitemap'])->name('sitemap.xml');
Route::get('/robots.txt', [App\Http\Controllers\SeoController::class, 'robots'])->name('robots.txt');
Route::get('/llms.txt', [App\Http\Controllers\SeoController::class, 'llms'])->name('llms.txt');


