<?php

// Transactions Management
$baseModule = '\App\Modules\PaymentMethods\Controllers';
$baseController = 'TransactionsController';

Route::group(['prefix' => 'payments'], function() use ($baseModule) {
    Route::get('/', "$baseModule\PaymentMethodsController@index");
    Route::get('/new', "$baseModule\PaymentMethodsController@create");
    Route::post('/new', "$baseModule\PaymentMethodsController@store");
    Route::get('/{id}', "$baseModule\PaymentMethodsController@show");
    Route::get('/edit/{id}', "$baseModule\PaymentMethodsController@edit");
    Route::post('/edit/{id}', "$baseModule\PaymentMethodsController@update");
    Route::post('/delete', "$baseModule\PaymentMethodsController@destroy");
});
