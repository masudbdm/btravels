<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    // placeholder (if needed later)
    Route::get('my/gallery', [
        'uses' => 'Cp\Gallery\Controllers\GalleryController@myGallery',
        'as' => 'myGallery'
    ]);
});

Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {
    Route::get('galleries/all', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleriesAll',
        'as' => 'admin.galleriesAll'
    ]);

    Route::post('gallery/store', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleryStore',
        'as' => 'admin.galleryStore'
    ]);

    Route::get('gallery/edit/{gallery}', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleryEdit',
        'as' => 'admin.galleryEdit'
    ]);

    Route::post('gallery/update/{gallery}', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleryUpdate',
        'as' => 'admin.galleryUpdate'
    ]);

    Route::post('gallery/delete/{gallery}', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleryDelete',
        'as' => 'admin.galleryDelete'
    ]);

    Route::post('gallery/{gallery}/item/store', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleryItemStore',
        'as' => 'admin.galleryItemStore'
    ]);

    Route::post('gallery/item/delete/{galleryItem}', [
        'uses' => 'Cp\Gallery\Controllers\AdminGalleryController@galleryItemDelete',
        'as' => 'admin.galleryItemDelete'
    ]);
});

