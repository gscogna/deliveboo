<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'RestaurantController@index')->name('guest.restaurant.index');
Route::get('/restaurant/menu-ristorante', 'RestaurantController@show')->name('guest.restaurant.show');

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::resource('plates', 'PlateController');
        // Route::get('/statistiche', 'RestaurantController@statistiche')->name('admin.restaurants.statistiche');
        // Route::get('/plates/search', 'PlateController@search')->name('search');
        Route::resource('/restaurants', 'RestaurantController');
        Route::get('/statistiche', 'RestaurantController@statistiche')->name('admin.statistiche');
    });

    Route::get('/payment/process', 'PagamentiController@process')->name('payment.process');
    Route::post('payment/checkout', 'PagamentiController@checkout')->name('payment.checkout');
    Route::post('/carrello', 'RestaurantController@add')->name('add.carrello.post');
    Route::get('/carrello', 'RestaurantController@get')->name('add.carrello.get');
