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

Route::get('/', ['as' => 'home', 'uses' =>'PageController@index']);

Route::post('/selected', ['as' => 'selected', 'uses' => 'PageController@selected']);

Route::get('/donated', 'PageController@donated');

Route::get('/image.png', 'PageController@image');