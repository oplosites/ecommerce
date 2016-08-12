<?php

// Transactions Management
$baseModule = '\\App\\Modules\\Transactions\\Controllers';

Route::group(['prefix' => 'transactions'], function() use ($baseModule) {
    Route::get('/', "$baseModule\\TransactionsController@index");
});
