<?php
//menupage //menu & page
Route::group(['middleware' => ['web']], function () {

    Route::get('my/our-project', [
        'uses' => 'Cp\BlogPost\Controllers\BlogPostController@myBlogPost',
        'as' => 'myBlogPost'
    ]);
});


//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {


    Route::get('blog/categories/all', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoriesAll',
        'as' => 'admin.blogCategoriesAll'
    ]);


    Route::get('blog/category/create', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoryCreate',
        'as' => 'admin.blogCategoryCreate'
    ]);

    Route::post('blog/category/store', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoryStore',
        'as' => 'admin.blogCategoryStore'
    ]);

    Route::get('blog/category/edit/category/{category}', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoryEdit',
        'as' => 'admin.blogCategoryEdit'
    ]);

    Route::post('blog/category/update/category/{category}', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoryUpdate',
        'as' => 'admin.blogCategoryUpdate'
    ]);


    Route::post('blog/category/delete/category/{category}', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoryDelete',
        'as' => 'admin.blogCategoryDelete'
    ]);


    Route::post('blog/category/active', [
        'uses' => 'Cp\BlogPost\Controllers\AdminBlogPostController@blogCategoryActive',
        'as' => 'admin.blogCategoryActive'
    ]);




    //ALL CLIENT ROUTE

    Route::get('clients/all', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientsAll',
        'as' => 'admin.clientsAll'
    ]);

    Route::get('client/create', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientCreate',
        'as' => 'admin.clientCreate'
    ]);

    Route::post('client/store', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientStore',
        'as' => 'admin.clientStore'
    ]);

    Route::get('client/edit/{client}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientEdit',
        'as' => 'admin.clientEdit'
    ]);

    Route::get('client/show/client/{client}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientShow',
        'as' => 'admin.clientShow'
    ]);


    Route::post('client/update/client/{client}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientUpdate',
        'as' => 'admin.clientUpdate'
    ]);

    Route::post('client/delete/client/{client}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientDelete',
        'as' => 'admin.clientDelete'
    ]);

    Route::get('post/file/delete/{file}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@postFileDelete',
        'as' => 'admin.postFileDelete'
    ]);


    Route::post('client/active', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientActive',
        'as' => 'admin.clientActive'
    ]);

    Route::get('client/sort', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@clientSort',
        'as' => 'admin.clientSort'
    ]);



    //-----------------------------------Our Project Route---------------------------------

    Route::get('our-projects/all', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectAll',
        'as' => 'admin.ourProjectAll'
    ]);

    Route::get('our-project/create', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectCreate',
        'as' => 'admin.ourProjectCreate'
    ]);

    Route::post('our-project/store', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectStore',
        'as' => 'admin.ourProjectStore'
    ]);

    Route::get('our-project/edit/{ourProject}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectEdit',
        'as' => 'admin.ourProjectEdit'
    ]);

    Route::get('our-project/show/{ourProject}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectShow',
        'as' => 'admin.ourProjectShow'
    ]);


    Route::post('our-project/update/{ourProject}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectUpdate',
        'as' => 'admin.ourProjectUpdate'
    ]);

    Route::post('our-project/delete/{ourProject}', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectDelete',
        'as' => 'admin.ourProjectDelete'
    ]);

    Route::post('our-project/active', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@ourProjectActive',
        'as' => 'admin.ourProjectActive'
    ]);

    Route::get('our-project/sort', [
        'uses' => 'Cp\ClientProject\Controllers\AdminClientProjectController@projectSort',
        'as' => 'admin.projectSort'
    ]);

});
