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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'BioController@index');
Route::post('/studentadd', 'BioController@store');
Route::put('/studentupdate/{id}', 'BioController@update');
Route::delete('/studentdelete/{id}', 'BioController@destroy');


Route::resource('bio', 'BioController');