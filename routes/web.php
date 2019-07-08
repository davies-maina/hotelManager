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

Auth::routes();



Route::group(['middleware'=>'auth'],function(){



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hotels', 'HotelController@index')->name('hotels');
Route::get('/hotels/menu/{id}', 'MenuController@index')->name('hotel.menu');

Route::get('/hotels/orders/{id}', 'HotelOrderController@index')->name('hotel.orders');
Route::get('/hotels/orders/{id}/addorder', 'HotelOrderController@addOrder')->name('hotel.orders.addorder');

});