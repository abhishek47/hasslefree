e<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
    return view('pages.faq');
})->middleware('guest');

Route::get('/about-app', function () {
    return view('pages.about-app');
})->middleware('guest');

Auth::routes();

Route::get('/profile', 'UserController@profile');
Route::get('/settings', 'UserController@settings');

Route::post('/profile', 'UserController@updateProfile');
Route::post('/password', 'UserController@updatePassword');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bookings', 'BookingsController@index');
Route::get('/bookings/{booking}', 'BookingsController@show');
Route::get('/bookings/{booking}/receipt', 'BookingsController@print');
Route::get('/bookings/{booking}/preview', 'BookingsController@preview');
Route::get('/bookings/{booking}/download', 'BookingsController@download');
Route::get('/bookings/{booking}/pay', 'PaymentsController@addMoney');
Route::get('/bookings/{booking}/cod', 'BookingsController@confirmWithCOD');
Route::get('/bookings/{booking}/delete', 'BookingsController@destroy');
Route::get('/bookings/{booking}/cancel', 'BookingsController@cancel');

Route::post('/booking/refund', 'RefundController@store');
Route::post('/bookings', 'BookingsController@store');

Route::get('/coupons/apply/{booking}/coupon:{code}', 'CouponsController@apply');

Route::get('/coupons/apply/{booking}/coupon:{code}/remove', 'CouponsController@remove');


Route::get('/payments/response/', 'PaymentsController@response');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

