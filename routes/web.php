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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/paises', 'PaisController@show');
Route::post('/paises', 'PaisController@store');
Route::delete('/paises/{id}', 'PaisController@destroy');
Route::get('/paises/{id}/edit', 'PaisController@edit');
Route::post('/paises/{id}/edit', 'PaisController@update');

Route::get('/regiones', 'RegionController@show');
Route::post('/regiones', 'RegionController@store');
Route::delete('/regiones/{id}', 'RegionController@destroy');
Route::get('/regiones/{id}/edit', 'RegionController@edit');
Route::post('/regiones/{id}/edit', 'RegionController@update');

Route::get('/departamentos', 'DepartamentoController@show');
Route::post('/departamentos', 'DepartamentoController@store');
Route::delete('/departamentos/{id}', 'DepartamentoController@destroy');
Route::get('/departamentos/{id}/edit', 'DepartamentoController@edit');
Route::post('/departamentos/{id}/edit', 'DepartamentoController@update');

Route::get('/partidos', 'PartidoController@show');
Route::post('/partidos', 'PartidoController@store');
Route::delete('partidos/{id}', 'PartidoController@destroy');
Route::get('/partidos/{id}/edit', 'PartidoController@edit');
Route::post('/partidos/{id}/edit', 'PartidoController@update');

Route::get('/poblaciones', 'PoblacionController@show');
Route::post('/poblaciones', 'PoblacionController@store');
Route::delete('/poblaciones/{id}', 'PoblacionController@destroy');
Route::get('/poblaciones/{id}/edit', 'PoblacionController@edit');
Route::post('/poblaciones/{id}/edit', 'PoblacionController@update');



