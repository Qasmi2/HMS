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
    return view('main-page');
});
//REGISTERIION PAGE
Route::get('/reg', function () {
    return view('auth.register');
})->name('reg');
//REGISTERAION FORM DATA PASS TO CONTROLLER 
Route::post('/regis', 'FrontEndController@getregisters')->name('regis');
//LOGIN PAGE
Route::get('/logi', function () {
    return view('auth.login');
})->name('logi');
//LOGIN FORM DATA PASS TO CONTROLLER 
Route::post('/log', 'FrontEndController@getLogin')->name('log');
//ADD PROPERTY 
Route::get('/addproperty', function () {
    return view('adminAction.add-property');
})->name('addproperty');
//ADD PROPERTY FROM DATA
Route::post('/propertyAdd', 'FrontEndPropertyController@getProperty')->name('propertyAdd');



Route::get('/desh', function () {
    return view('DeshBoard');
})->name('/desh');
Route::get('/masterdesh', function () {
    return view('Deshboard.Master-Deshboard');
})->name('/masterdesh');
Route::get('/errorMessage', function () {
    return view('error');
})->name('/errorMessage');
Route::get('/mainpage', 'MainPageController@mainPage')->name('mainpage');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user','HomeController@deshboardUser')->name('/user');
// HOME PAGE 
 


