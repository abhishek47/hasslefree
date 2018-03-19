<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::post('register', 'Auth\RegisterController@register');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout');

 Route::get('profile', 'Api\ProfileController@get');
 Route::post('profile', 'Api\ProfileController@update');

 Route::get('/bookings', 'Api\BookingsController@index');
 Route::post('/bookings', 'Api\BookingsController@store');

 Route::get('/bookings/{booking}/cancel', 'Api\BookingsController@cancel');	
  Route::get('/bookings/{booking}/cod', 'Api\BookingsController@confirmWithCOD');	

  Route::post('/password/sendmail', 'Api\ProfileController@sendResetLinkEmail');



Route::get('/get-trains', 'Api\LocationsController@getTrains');

Route::get('/get-buses', 'Api\LocationsController@getBuses');

Route::get('/get-airports', 'Api\LocationsController@getAirports');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


