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
});

Route::get('/callbacks', 'CallbackController@index');
Route::post('/callback/save', 'CallbackController@save')->name('callback_save');
Route::get('/drivers', 'DriverController@index');
Route::post('/driver/save', 'DriverController@save');