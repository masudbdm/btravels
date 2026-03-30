<?php
//menupage //menu & page
Route::group(['middleware' => ['web']], function () {

    Route::get('my/tour', [
        'uses' => 'Cp\Tour\Controllers\TourController@myTour',
        'as' => 'myTour'
    ]);
});


//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {

    // media route

    Route::get('tours/all', [
        'uses' => 'Cp\Tour\Controllers\AdminTourController@toursAll',
        'as' => 'admin.toursAll'
    ]);


    Route::get('tour/create', [
        'uses' => 'Cp\Tour\Controllers\AdminTourController@tourCreate',
        'as' => 'admin.tourCreate'
    ]);

    Route::post('tour/store', [
        'uses' => 'Cp\Tour\Controllers\AdminTourController@tourStore',
        'as' => 'admin.tourStore'
    ]);

    Route::get('tour/edit/{tour}', [
        'uses' => 'Cp\Tour\Controllers\AdminTourController@tourEdit',
        'as' => 'admin.tourEdit'
    ]);

    Route::post('tour/update/{tour}', [
        'uses' => 'Cp\Tour\Controllers\AdminTourController@tourUpdate',
        'as' => 'admin.tourUpdate'
    ]);

    Route::post('tour/delete/{tour}', [
        'uses' => 'Cp\Tour\Controllers\AdminTourController@tourDelete',
        'as' => 'admin.tourDelete'
    ]);
});
