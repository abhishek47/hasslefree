<?php

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

Route::get('/start', 'PhoneAuthController@getLogin');
Route::get('/start/register', 'PhoneAuthController@getRegister');
Route::post('/start/register', 'PhoneAuthController@postRegister');
Route::get('/start/verify', 'PhoneAuthController@getVerify');
Route::get('/start/referral', 'PhoneAuthController@getReferral');
Route::post('/start/referral', 'PhoneAuthController@postReferral');

Route::post('user/validate/', 'PhoneAuthController@postLogin');
Route::post('user/auth/', 'PhoneAuthController@tryAuth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
    return view('pages.faq');
})->middleware('guest');

Route::get('/contact', function () {
    return view('pages.contact');
})->middleware('guest');

Route::get('/about-app', function () {
    return view('pages.about-app');
})->middleware('guest');

Route::get('/faq-app', function () {
    return view('pages.faq-app');
})->middleware('guest');

Route::get('/mobile-apps', function () {
    return view('pages.mobile-apps');
})->middleware('guest');

Auth::routes();

Route::get('/login', function(){
    return redirect('/start');
})->name('login');

Route::get('/register', function(){
    return redirect('/start');
})->name('register');


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/notifications/new', 'NotificationsController@index');
Route::post('/notifications/send', 'NotificationsController@send');

Route::get('/profile', 'UserController@profile');
Route::get('/settings', 'UserController@settings');

Route::post('/profile', 'UserController@updateProfile');
Route::post('/password', 'UserController@updatePassword');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bookings', 'BookingsController@index');
Route::get('/bookings/new', 'BookingsController@new');
Route::post('/bookings/new', 'BookingsController@storeNew');
Route::get('/bookings/{booking}', 'BookingsController@show');
Route::get('/bookings/{booking}/receipt', 'BookingsController@print');
Route::get('/bookings/{booking}/edit', 'BookingsController@edit');
Route::post('/bookings/{booking}/update', 'BookingsController@update');
Route::get('/bookings/{booking}/preview', 'BookingsController@preview');
Route::get('/bookings/{booking}/download', 'BookingsController@download');
Route::get('/bookings/{booking}/pay', 'PaymentsController@addMoney');
Route::get('/bookings/{booking}/cod', 'BookingsController@confirmWithCOD');
Route::get('/bookings/{booking}/delete', 'BookingsController@destroy');
Route::get('/bookings/{booking}/cancel', 'BookingsController@cancel');
Route::get('/bookings/manage/{booking}/verify', 'ScannerController@verify');
Route::post('/bookings/manage/{booking}/verify', 'ScannerController@postVerify');
Route::get('/bookings/manage/{booking}/scan', 'ScannerController@scan');
Route::get('/bookings/manage/{booking}/', 'ScannerController@manage');
Route::post('/booking/refund', 'RefundController@store');
Route::post('/bookings', 'BookingsController@store');

Route::get('/coupons/apply/{booking}/coupon:{code}', 'CouponsController@apply');

Route::get('/coupons/apply/{booking}/coupon:{code}/remove', 'CouponsController@remove');


Route::get('/payments/response/', 'PaymentsController@response');

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

