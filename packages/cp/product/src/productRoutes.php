<?php
//menupage //menu & page
Route::group(['middleware' => ['web']], function () {

    Route::get('my/product', [
        'uses' => 'Cp\Product\Controllers\ProductController@myProduct',
        'as' => 'myProduct'
    ]);
});


//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {



    // Route::post('smart/shop/product/details/update/single/{product?}', [
    //     'uses' =>'Cp\Smartshop\Controllers\ProductController@productDetailsUpdateSingle',
    //     'as' => 'productDetailsUpdateSingle'
    // ]);


    // Route::any('smartbazar/home/members/auto/{bazar?}',[
    // 'uses' =>'Cp\Smartshop\Controllers\BazarController@bazarHomeMembersAll',
    // 'as' => 'bazarHomeMembersAll'
    // ]);

    // Category route

    Route::get('product/categories/all', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoriesAll',
        'as' => 'admin.productCategoriesAll'
    ]);


    Route::get('product/category/create', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoryCreate',
        'as' => 'admin.productCategoryCreate'
    ]);

    Route::post('product/category/store', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoryStore',
        'as' => 'admin.productCategoryStore'
    ]);

    Route::get('product/category/edit/category/{category}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoryEdit',
        'as' => 'admin.productCategoryEdit'
    ]);

    Route::post('product/category/update/category/{category}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoryUpdate',
        'as' => 'admin.productCategoryUpdate'
    ]);


    Route::post('product/category/delete/category/{category}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoryDelete',
        'as' => 'admin.productCategoryDelete'
    ]);


    Route::post('product/category/active', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCategoryActive',
        'as' => 'admin.productCategoryActive'
    ]);



    // SubCategory route

    Route::get('product/subCategories/all', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoriesAll',
        'as' => 'admin.productSubCategoriesAll'
    ]);

    Route::get('product/subCategory/create', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoryCreate',
        'as' => 'admin.productSubCategoryCreate'
    ]);

    Route::post('product/subCategory/store', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoryStore',
        'as' => 'admin.productSubCategoryStore'
    ]);

    Route::get('product/subCategory/edit/subCategory/{subCategory}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoryEdit',
        'as' => 'admin.productSubCategoryEdit'
    ]);

    Route::post('product/subCategory/update/subCategory/{subCategory}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoryUpdate',
        'as' => 'admin.productSubCategoryUpdate'
    ]);

    Route::post('product/subCategory/delete/subCategory/{subCategory}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoryDelete',
        'as' => 'admin.productSubCategoryDelete'
    ]);

    Route::post('product/subCategory/active', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productSubCategoryActive',
        'as' => 'admin.productSubCategoryActive'
    ]);



    // product route

    Route::get('products/all', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productsAll',
        'as' => 'admin.productsAll'
    ]);

    Route::get('product/create', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productCreate',
        'as' => 'admin.productCreate'
    ]);

    Route::post('product/store', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productStore',
        'as' => 'admin.productStore'
    ]);

    Route::get('product/edit/product/{product}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productEdit',
        'as' => 'admin.productEdit'
    ]);

    Route::get('product/show/product/{product}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productShow',
        'as' => 'admin.productShow'
    ]);


    Route::post('product/update/product/{product}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productUpdate',
        'as' => 'admin.productUpdate'
    ]);

    Route::post('product/delete/product/{product}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productDelete',
        'as' => 'admin.productDelete'
    ]);

    Route::get('product/file/delete/{file}', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productFileDelete',
        'as' => 'admin.productFileDelete'
    ]);


    Route::post('product/active', [
        'uses' => 'Cp\Product\Controllers\AdminProductController@productActive',
        'as' => 'admin.productActive'
    ]);
});
