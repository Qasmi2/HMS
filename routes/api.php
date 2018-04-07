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


// Route define the Registation and login for user 

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('get-details', 'UserController@getDetails');
});



//Route of the admin side

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('yourProperties', 'propertyController@index');
    Route::get('getProperty/{id}', 'propertyController@show');
    Route::get('getAllProperties', 'propertyController@showAllProperty');
    Route::post('createProperty', 'propertyController@store');
    Route::put('updateProperty/{id}', 'propertyController@update');
    Route::delete('deleteProperty/{id}', 'propertyController@destroy');

    //Room 

    Route::get('getRooms/{id}','roomController@index');
    Route::get('getRoom/{id}','roomController@show');
    Route::post('createRoom','roomController@store');
    Route::put('updatedRoom/{id}','roomController@update');
    Route::delete('deleteRoom/{id}','roomController@destroy');
});

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('booking','bookingController@store');
    Route::put('booked/{id}','bookingController@update');
});



