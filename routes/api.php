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
// Laravel Backend API
Route::get('rooms', 'RoomController@index');
Route::group(['prefix' => 'rooms'], function () {
    Route::post('add', 'RoomController@store');
    Route::get('edit/{id}', 'RoomController@edit');
    Route::post('update/{id}', 'RoomController@update');
    Route::post('delete/{id}', 'RoomController@destroy');
});
