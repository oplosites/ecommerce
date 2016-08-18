<?php

// Transactions Management
$baseModule = '\App\Modules\Transactions\Controllers';
$baseController = 'TransactionsController';

Route::group(['prefix' => 'transactions'], function() use ($baseModule) {
    Route::get('/', "$baseModule\TransactionsController@index");
    Route::get('/new', "$baseModule\TransactionsController@create");
    Route::post('/new', "$baseModule\TransactionsController@store");
    Route::get('/{id}', "$baseModule\TransactionsController@show");
    Route::get('/edit/{id}', "$baseModule\TransactionsController@edit");
    Route::post('/edit/{id}', "$baseModule\TransactionsController@update");
    Route::post('/delete', "$baseModule\TransactionsController@destroy");
});
