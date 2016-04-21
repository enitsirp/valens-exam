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

Route::get('/', 'CarsController@index');

Route::get('/car/add', 'CarsController@create');
Route::post('/car', 'CarsController@store');
Route::get('/car/{car}', 'CarsController@edit');
Route::patch('/car/{car}', 'CarsController@update');
Route::delete('/car/{car}', 'CarsController@destroy');
