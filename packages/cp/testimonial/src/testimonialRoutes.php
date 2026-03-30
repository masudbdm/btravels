<?php
//menupage //menu & page
Route::group(['middleware' => ['web']], function () {

    Route::get('my/testimonial', [
        'uses' => 'Cp\Testimonial\Controllers\TestimonialController@mytestimonial',
        'as' => 'mytestimonial'
    ]);
});


//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {

    // media route

    Route::get('testimonial/all', [
        'uses' => 'Cp\Testimonial\Controllers\AdminTestimonialController@testimonialAll',
        'as' => 'admin.testimonialAll'
    ]);

    Route::post('testimonial/testimonialtore', [
        'uses' => 'Cp\Testimonial\Controllers\AdminTestimonialController@testimonialtore',
        'as' => 'admin.testimonialtore'
    ]);

    Route::get('testimonial/edit/{testimonial}', [
        'uses' => 'Cp\Testimonial\Controllers\AdminTestimonialController@TestimonialEdit',
        'as' => 'admin.testimonialEdit'
    ]);

    Route::post('testimonial/update/{testimonial}', [
        'uses' => 'Cp\Testimonial\Controllers\AdminTestimonialController@testimonialUpdate',
        'as' => 'admin.testimonialUpdate'
    ]);

    Route::post('testimonial/delete/{testimonial}', [
        'uses' => 'Cp\Testimonial\Controllers\AdminTestimonialController@testimonialDelete',
        'as' => 'admin.testimonialDelete'
    ]);
});
