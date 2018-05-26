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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/insert', 'FeesController@index')->name('insert_page');

Route::get('/home', 'FeesController@insert')->name('home_page');
Route::post('/home', 'FeesController@store_insert');
Route::post('/insert', 'FeesController@store');
