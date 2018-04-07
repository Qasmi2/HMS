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

//HOME PAGE Show
Route::get('/', function () {
    return view('layouts.app');
});
//REGISTERIION PAGE
Route::get('/reg', function () {
    return view('auth.register');
})->name('reg');
//REGISTERAION FORM DATA PASS TO CONTROLLER 
Route::post('/regis', 'FrontEndController@getRegisters')->name('regis');
//LOGIN PAGE
Route::get('/logi', function () {
    return view('auth.login');
})->name('logi');
//LOGIN FORM DATA PASS TO CONTROLLER 
Route::post('/log', 'FrontEndController@getLogin')->name('log');

// })->name('/reg');
// Route::post('/registertion', ['as' => 'registertion', 'uses' => 'FrontEndController@getRegisters']);

// // Route::post('registerForm', 'FrontEndController@getRegister');
// // Route::post('login', 'FrontEndController@getLogin');

// Route::get('/master', function () {
//     return view('layout.master');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user','HomeController@deshboardUser')->name('/user');
// Auth::routes();
// Route::get('/home', 'HomeController@deshboard-Admin')->name('home');


