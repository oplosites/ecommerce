<?php

// Transactions Management
$baseModule = '\App\Modules\Users\Controllers';
$baseController = 'UsersController';

Route::group(['prefix' => 'users'], function() use ($baseModule, $baseController) {
    Route::get('/', "$baseModule\\$baseController@index");
    Route::get('/new', "$baseModule\\$baseController@create");
    Route::post('/new', "$baseModule\\$baseController@store");
    Route::get('/{id}', "$baseModule\\$baseController@show");
    Route::get('/edit/{id}', "$baseModule\\$baseController@edit");
    Route::post('/edit/{id}', "$baseModule\\$baseController@update");
    Route::post('/delete', "$baseModule\\$baseController@destroy");
});
