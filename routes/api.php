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

    Route::get('propertyget', 'propertyController@index');
    Route::get('propertyget/{id}', 'propertyController@show');
    Route::post('propertyCreate', 'propertyController@store');
    Route::put('property/{id}', 'propertyController@update');
    Route::delete('propertyDelete/{id}', 'propertyController@destroy');

    //Room 

    Route::get('getRoom','roomController@index');
    Route::get('getRoom/{id}','roomController@show');
    Route::post('createRoom','roomController@store');
    Route::put('getRoom/{id}','roomController@update');
    Route::delete('delete/{id}','roomController@destroy');
});





