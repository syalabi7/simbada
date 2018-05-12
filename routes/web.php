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

Route::resource('locations', 'LocationController');
Route::get('locations/destroy/{id}', 'LocationController@destroy');

Route::resource('asets', 'AsetController');

Route::get('asets/deleteall', 'AsetController@deleteAll');

Route::resource('categories', 'CategoryController');
Route::get('categories/destroy/{id}', 'CategoryController@destroy');

Route::get('perkondisi', 'PerLokasiController@perKondisi');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index');
