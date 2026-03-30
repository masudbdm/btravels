<?php
//frontend
Route::group(['middleware' => ['web']], function () {

   
});


//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {


    //ALL QuestionAnswer ROUTE

    Route::get('question/answers/all', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswersAll',
        'as' => 'admin.questionAnswersAll'
    ]);

    Route::get('question/answer/create', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerCreate',
        'as' => 'admin.questionAnswerCreate'
    ]);

    Route::post('question/answer/store', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerStore',
        'as' => 'admin.questionAnswerStore'
    ]);

    Route::get('question/answer/edit/{qa}', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerEdit',
        'as' => 'admin.questionAnswerEdit'
    ]);


    Route::post('question/answer/update/{qa}', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerUpdate',
        'as' => 'admin.questionAnswerUpdate'
    ]);

     Route::get('question/answer/details/{qa}', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerDetails',
        'as' => 'admin.questionAnswerDetails'
    ]);

    Route::post('question/answer/delete/{qa}', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerDelete',
        'as' => 'admin.questionAnswerDelete'
    ]);


    Route::post('question/answer/active', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerActive',
        'as' => 'admin.questionAnswerActive'
    ]);

    Route::get('question/answer/sort', [
        'uses' => 'Cp\QuestionAnswer\Controllers\AdminQuestionAnswerController@questionAnswerSort',
        'as' => 'admin.questionAnswerSort'
    ]);

});