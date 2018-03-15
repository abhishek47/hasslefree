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

  Route::post('profile', 'Auth\ProfileController@get');

 Route::get('/bookings', 'Api\BookingsController@index');
 Route::post('/bookings', 'Api\BookingsController@store');

 Route::get('/bookings/{booking}/cancel', 'Api\BookingsController@cancel');	
  Route::get('/bookings/{booking}/cod', 'Api\BookingsController@confirmWithCOD');	

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


