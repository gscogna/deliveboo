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
Route::get('/restaurants/ciao', 'RestaurantController@show')->name('guest.restaurant.show');
Route::get('/restaurants/carrello', 'RestaurantController@carrello')->name('guest.restaurant.carrello');

Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::resource('plates', 'PlateController');
        Route::get('/ordini', 'RestaurantController@ordini')->name('admin.restaurants.ordini');
        Route::get('/statistiche', 'RestaurantController@statistiche')->name('admin.restaurants.statistiche');
        // Route::get('/plates/search', 'PlateController@search')->name('search');
    });
