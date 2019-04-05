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

Route::get('/', 'MainController@index')->name('frontpage');
Route::get('/event/{id}', 'MainController@showEvent')->name('event');

Route::get('/admin', 'HomeController@index')->name('admin');

Route::resource('/admin/events', 'AdminEventsController');
Route::resource('/admin/promo-events', 'AdminPromoEventsController');