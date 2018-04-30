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
// GET Property for public views 
Route::get('/showproperty', 'searchingController@index');
Route::get('/showpropertySector/{id}', 'searchingController@sector');
Route::get('/showpropertyUniversity/{id}', 'searchingController@univerity');
// Route::post('/showpropertySector', 'searchingController@sectorall');
//Route of the admin side

// Route::group(['middleware' => 'auth:api'], function(){

    Route::post('yourProperties', 'propertyController@properties');
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

    // Route::post('booking','roomController@booking');
    // Route::put('booked/{id}','roomController@update');

    Route::post('booking','bookingController@store');
    Route::post('status','bookingController@status');
    Route::put('booked/{id}','bookingController@update');
    Route::get('request/{id}','bookingController@show');

   
// });

//Route::group(['middleware' => 'auth:api'], function(){

    
//});



