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

Route::get('/', 'WelcomeController@index');

Route::get('/v1/states/{state}/cities', 'CitiesController@fromState');
Route::get('/v1/states/{state}/cities/{city}', 'CitiesController@nearCity');

Route::get('/v1/users/{user}/visits', 'UsersController@cities');
Route::post('/v1/users/{user}/visits', 'UsersController@registerVisit');
