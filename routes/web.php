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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bookings', 'BookingsController@index');
Route::get('/bookings/{booking}', 'BookingsController@show');
Route::get('/bookings/{booking}/pay', 'PaymentsController@addMoney');
Route::get('/bookings/{booking}/delete', 'BookingsController@destroy');
Route::post('/bookings', 'BookingsController@store');


Route::get('/payments/response/', 'PaymentsController@response');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
