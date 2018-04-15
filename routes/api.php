<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'prefix' => 'v1', 'middleware' => 'auth:api'], function(){

	Route::get('/', function(){ return 'ContentController@home'; });


	Route::get('/clients', 'ClientsController@index');

	Route::put('/clients/new', 'ClientsController@newClient');
	
	Route::get('/clients/{client_id}', 'ClientsController@show');
	Route::patch('/clients/{client_id}', 'ClientsController@modify');

	Route::get('/reservation/{user_id}', 'ReservationsController@index');
	Route::put('book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');
	
} );

Auth::routes();

