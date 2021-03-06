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

Route::get('register', 'Auth\RegisterController@register')->name('register');
Route::post('register', 'Auth\RegisterController@store');

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'Auth\LoginController@home')->name('home');

Route::get('forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('forget-password', 'Auth\ForgotPasswordController@postEmail');

Route::get('reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('reset-password', 'Auth\ResetPasswordController@updatePassword');

// stock route
Route::get('stock', 'StockController@index')->name('stock');
Route::get('stock/create', 'StockController@create')->name('stock.create');
Route::post('stock/store', 'StockController@store')->name('stock.store');
Route::get('stock/{stock}/edit', 'StockController@edit')->name('stock.edit');
Route::put('stock/{stock}', 'StockController@update')->name('stock.update');
Route::delete('stock/{stock}', 'StockController@destroy')->name('stock.destroy');

//sales route
Route::get('sales', 'SaleController@index')->name('sale');
Route::get('sales/create', 'SaleController@create')->name('sale.create');
Route::post('sales/store', 'SaleController@store')->name('sale.store');
Route::delete('sales/{sale}', 'SaleController@destroy')->name('sale.destroy');

//performance
Route::get('performance', 'PerformanceController@index')->name('performance');