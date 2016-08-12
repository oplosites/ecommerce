<?php

// Evaluation management
$baseModule = '\App\Modules\Products\Controllers';

Route::group(['prefix' => 'admin'], function() use ($baseModule) {
    Route::get('/', "$baseModule\ProductController@index");

    Route::group(['prefix' => 'product'], function() use ($baseModule) {
        Route::get('/', "$baseModule\ProductController@index");
        Route::get('/new', "$baseModule\ProductController@create");
        Route::post('/new', "$baseModule\ProductController@store");
        Route::get('/{id}', "$baseModule\ProductController@show");
        Route::get('/edit/{id}', "$baseModule\ProductController@edit");
        Route::post('/edit/{id}', "$baseModule\ProductController@update");
        Route::post('/delete', "$baseModule\ProductController@destroy");
    });

    Route::group(['prefix' => 'categories'], function() use ($baseModule) {
        Route::get('/', "$baseModule\CategoriesController@index");
        Route::get('/new', "$baseModule\CategoriesController@create");
        Route::post('/new', "$baseModule\CategoriesController@store");
        Route::get('/{id}', "$baseModule\CategoriesController@show");
        Route::get('/edit/{id}', "$baseModule\CategoriesController@edit");
        Route::post('/edit/{id}', "$baseModule\CategoriesController@update");
        Route::post('/delete', "$baseModule\CategoriesController@destroy");
    });

    Route::group(['prefix' => 'types'], function() use ($baseModule) {
        Route::get('/', "$baseModule\ProductTypesController@index");
        Route::get('/new', "$baseModule\ProductTypesController@create");
        Route::post('/new', "$baseModule\ProductTypesController@store");
        Route::get('/{id}', "$baseModule\ProductTypesController@show");
        Route::get('/edit/{id}', "$baseModule\ProductTypesController@edit");
        Route::post('/edit/{id}', "$baseModule\ProductTypesController@update");
        Route::post('/delete', "$baseModule\ProductTypesController@destroy");
    });
});
