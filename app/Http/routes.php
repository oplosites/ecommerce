<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Evaluation management
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'ProductController@index');

    Route::group(['prefix' => 'product'], function() {
        Route::get('/', 'ProductController@index');
        Route::get('/new', 'ProductController@create');
        Route::post('/new', 'ProductController@store');
        Route::get('/{id}', 'ProductController@show');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::post('/edit/{id}', 'ProductController@update');
        Route::post('/delete', 'ProductController@destroy');
    });

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/new', 'CategoriesController@create');
        Route::get('/{id}', 'CategoriesController@show');
        Route::get('/', 'CategoriesController@index');
        Route::post('/new', 'CategoriesController@store');
        Route::get('/edit/{id}', 'CategoriesController@edit');
        Route::post('/edit/{id}', 'CategoriesController@update');
        Route::post('/delete', 'CategoriesController@destroy');
    });

    Route::group(['prefix' => 'types'], function() {
        Route::get('/', 'ProductTypesController@index');
        Route::get('/new', 'ProductTypesController@create');
        Route::post('/new', 'ProductTypesController@store');
        Route::get('/{id}', 'ProductTypesController@show');
        Route::get('/edit/{id}', 'ProductTypesController@edit');
        Route::post('/edit/{id}', 'ProductTypesController@update');
        Route::post('/delete', 'ProductTypesController@destroy');
    });
});

Route::auth();

Route::get('/home', 'HomeController@index');
