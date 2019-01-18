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

Route::get('/', 'AllReceptsController@index')->name('all-recepts');
Route::get('/all-recepts/{id}', 'AllReceptsController@show')->name('all-recepts.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/home/ingridienties', 'IngridientController');
Route::resource('/home/recepties', 'ReceptController');
