<?php

// Evaluation management
$baseModule = '\App\Modules\Suars\Controllers';

Route::group(['prefix' => 'suars', 'middleware' => 'web'], function() use ($baseModule) {
    Route::get('/', "$baseModule\UrlsController@index");

    Route::group(['prefix' => 'url'], function() use ($baseModule) {
        Route::get('/', "$baseModule\UrlsController@index");
        Route::get('/new', "$baseModule\UrlsController@create");
        Route::post('/new', "$baseModule\UrlsController@store");
        Route::get('/{id}', "$baseModule\UrlsController@show");
        Route::get('/edit/{id}', "$baseModule\UrlsController@edit");
        Route::post('/edit/{id}', "$baseModule\UrlsController@update");
        Route::post('/delete', "$baseModule\UrlsController@destroy");
    });
});
