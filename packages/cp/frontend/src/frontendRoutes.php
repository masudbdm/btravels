<?php
//menupage //menu & page
Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@welcome',
        'as' => 'welcome'
    ]);

    Route::get('/ajax-welcome', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@lazyloadContent',
        'as' => 'lazyloadContent'
    ]);

    Route::get('/page/{id}/{slug?}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@page',
        'as' => 'page'
    ]);


    Route::get('/blog', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@blog',
        'as' => 'blog'
    ]);

    Route::get('/blog/{slug?}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@singlePost',
        'as' => 'singlePost'
    ]);

    Route::get('/client-details/{id}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@clientDetails',
        'as' => 'clientDetails'
    ]);
    Route::get('/project-details/{id}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@projectDetails',
        'as' => 'projectDetails'
    ]);




    Route::post('/contact-us', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@contactUs',
        'as' => 'contactUs'
    ]);

    Route::get('/search', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@search',
        'as' => 'search'
    ]);

    Route::get('/our/clients', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@ourClients',
        'as' => 'ourClients'
    ]);

    Route::get('/our/complete/projects', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@ourProjects',
        'as' => 'ourProjects'
    ]);

    Route::get('/our/teams', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@ourTeams',
        'as' => 'ourTeams'
    ]);
    Route::get('/our/team/details/{id}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@teamDetails',
        'as' => 'teamDetails'
    ]);

    Route::get('/about-us', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@aboutUs',
        'as' => 'aboutUs'
    ]);


      Route::get('question/answer/all', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@questionAnswerAll',
        'as' => 'questionAnswerAll'
    ]);
 
    Route::get('tour/package/details/{tourPackage}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@tourPackageDetails',
        'as' => 'tourPackageDetails'
    ]);

    Route::get('all/tour/package', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@allPackages',
        'as' => 'allPackages'
    ]);

    Route::get('all/guided/tours', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@allGuidedTours',
        'as' => 'allGuidedTours'
    ]);

      Route::get('tour/guide/details/{id}', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@tourGuideDetails',
        'as' => 'tourGuideDetails'
    ]);

    // Gallery (Most Popular Destinations -> Gallery)
    Route::get('/gallery', [
        'uses' => 'Cp\Frontend\Controllers\FrontendController@gallery',
        'as' => 'gallery',
    ]);
});
