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

Route::post('/start/register', 'Api\PhoneAuthController@postRegister');
Route::post('/start/referral', 'Api\PhoneAuthController@postReferral');
Route::post('user/validate/', 'Api\PhoneAuthController@postLogin');
Route::post('user/auth/', 'Api\PhoneAuthController@tryAuth');

Route::post('user/otp/', 'Api\PhoneAuthController@sendOTP');

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('login/direct', 'Auth\LoginController@direct');
Route::post('register/direct', 'Auth\RegisterController@direct');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('profile', 'Api\ProfileController@get');
Route::get('verify/resend', 'Api\ProfileController@verifyResend');
Route::post('profile', 'Api\ProfileController@update');

Route::get('/bookings', 'Api\BookingsController@index');
Route::post('/bookings', 'Api\BookingsController@store');

 Route::get('/bookings/{booking}/cancel', 'Api\BookingsController@cancel');
  Route::get('/bookings/{booking}/cod', 'Api\BookingsController@confirmWithCOD');

  Route::get('/bookings/{booking}/pay', 'Api\PaymentsController@addMoney');

  Route::post('/password/sendmail', 'Api\ProfileController@sendResetLinkEmail');

  Route::post('/estimate', 'Api\BookingsController@estimate');

  Route::post('/phone/sendotp', 'Api\ProfileController@sendOTP');



Route::get('/get-trains', 'Api\LocationsController@getTrains');

Route::get('/get-buses', 'Api\LocationsController@getBuses');

Route::get('/get-airports', 'Api\LocationsController@getAirports');

Route::get('/get-locations', 'Api\LocationsController@getLocations');

Route::get('/coupons/apply/{booking}/coupon:{code}', 'Api\CouponsController@apply');

Route::get('/coupons/apply/{booking}/coupon:{code}/remove', 'Api\CouponsController@remove');

Route::post('/users/push-token', 'Api\PushTokensController@register');




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


