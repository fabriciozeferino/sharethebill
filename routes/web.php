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

Route::get('/', 'HomeController@index');

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/bills/opened', 'BillController@opened')->name('bills.opened');
    Route::post('/bills/close', 'BillController@close')->name('bills.close');
    Route::resource('/bills', 'BillController');
});
