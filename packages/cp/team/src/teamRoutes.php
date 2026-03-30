<?php

//admin
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {

    Route::get('team/member/all', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamsAll',
        'as' => 'admin.teamsAll'
    ]);

    Route::get('team/member/create', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamCreate',
        'as' => 'admin.teamCreate'
    ]);

    Route::post('team/member/store', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamStore',
        'as' => 'admin.teamStore'
    ]);

    Route::get('team/member/edit/{team}', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamEdit',
        'as' => 'admin.teamEdit'
    ]);

    Route::post('team/member/update/{team}', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamUpdate',
        'as' => 'admin.teamUpdate'
    ]);


    Route::post('team/member/delete/{team}', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamDelete',
        'as' => 'admin.teamDelete'
    ]);


    Route::post('team/member/active', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamActive',
        'as' => 'admin.teamActive'
    ]);

    Route::get('team/member/sort', [
        'uses' => 'Cp\Team\Controllers\AdminTeamController@teamSort',
        'as' => 'admin.teamSort'
    ]);


});