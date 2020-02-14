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

Auth::routes();

Route::get('/', 'HotelsController@index')->name('hotels.index');
Route::get('/hotels', 'HotelsController@index')->name('hotels.index');
Route::post('/hotels', 'HotelsController@store');
Route::get('/hotels/create', 'HotelsController@create')->name('hotels.create');
Route::get('/hotels/{hotel}', 'HotelsController@show')->name('hotels.show');

Route::get('/hotels/{hotel}/rooms', 'RoomsController@index')->name('rooms.index');
Route::post('/hotels/{hotel}/rooms', 'RoomsController@store');
Route::get('/hotels/{hotel}/rooms/create', 'RoomsController@create')->name('rooms.create');
Route::get('/hotels/{hotel}/rooms/{room}', 'RoomsController@show')->name('rooms.show');

Route::get('/hotels/{hotel}/features', 'FeaturesController@index')->name('features.index');
Route::post('/hotels/{hotel}/features', 'FeaturesController@store');
Route::get('/hotels/{hotel}/features/create', 'FeaturesController@create')->name('features.create');
Route::get('/hotels/{hotel}/features/{feature}', 'FeaturesController@show')->name('features.show');

Route::get('/hotels/{hotel}/rooms/{room}/prices', 'PricesController@index')->name('prices.index');
Route::post('/hotels/{hotel}/rooms/{room}/prices', 'PricesController@store');
Route::get('/hotels/{hotel}/rooms/{room}/prices/create', 'PricesController@create')->name('prices.create');
Route::get('/hotels/{hotel}/rooms/{room}/prices/{price}', 'PricesController@show')->name('prices.show');

