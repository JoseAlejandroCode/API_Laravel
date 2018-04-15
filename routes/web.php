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

Route::get('/', 'ContentController@home')->name('home');

Route::get('/clients', 'ClientsController@index')->name('clients')->middleware('auth');
Route::get('/clients/new', 'ClientsController@newClient')->name('new_clients')->middleware('auth');

Route::post('/clients/new', 'ClientsController@newClient')->name('create_clients')->middleware('auth');

Route::get('/clients/{client_id}', 'ClientsController@show')->name('show_clients')->middleware('auth');
Route::post('/clients/{client_id}', 'ClientsController@modify')->name('modify_clients')->middleware('auth');

Route::get('/reservation/{user_id}', 'ReservationsController@index')->name('reservations')->middleware('auth');
Route::post('/reservation/{user_id}', 'ReservationsController@index')->name('reservations')->middleware('auth');
Route::get('book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('book_room')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');
