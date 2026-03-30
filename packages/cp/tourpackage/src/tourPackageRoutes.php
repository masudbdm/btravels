<?php
//menupage //menu & page
Route::group(['middleware' => ['web']], function () {

    Route::get('/career', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@career',
        'as' => 'career'
    ]);

    Route::get('apply/for/job/{jobPost}', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@applyForJop',
        'as' => 'applyForJop'
    ]);

    Route::post('apply/for/job/store', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@applyForJopStore',
        'as' => 'applyForJopStore'
    ]);
});


//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {


    // job-post route

    Route::get('job-posts/all', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackagesAll',
        'as' => 'admin.tourPackagesAll'
    ]);



    Route::get('job-post/create', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageCreate',
        'as' => 'admin.tourPackageCreate'
    ]);

    Route::post('job-post/store', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageStore',
        'as' => 'admin.tourPackageStore'
    ]);

    Route::get('job-post/edit/job-post/{tourPackage}', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageEdit',
        'as' => 'admin.tourPackageEdit'
    ]);



    Route::post('job-post/update/job-post/{tourPackage}', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageUpdate',
        'as' => 'admin.tourPackageUpdate'
    ]);

    Route::post('job-post/delete/job-post/{tourPackage}', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageDelete',
        'as' => 'admin.tourPackageDelete'
    ]);


    Route::post('job-post/active', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageActive',
        'as' => 'admin.tourPackageActive'
    ]);

    Route::post('/admin/tour-package-sortable', [
        'uses' => 'Cp\TourPackage\Controllers\AdminTourPackageController@tourPackageSortable',
        'as' => 'admin.tourPackageSortable'
    ]);

});
