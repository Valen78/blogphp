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

Route::pattern('id','[0-9]+');

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'FrontController@index');

    Route::get('article/{id}', 'FrontController@show');

    Route::get('category/{id}', 'FrontController@showPostByCategory');

    Route::post('score', 'FrontController@storeScore');

    Route::any('login', 'LoginController@login');

    Route::any('logout', 'LoginController@logout');

    Route::group(['middleware' => ['auth']], function () {

        Route::resource('post', 'PostController');
    });
});
