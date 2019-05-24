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

Route::get('/home', 'HomeController@index');


Route::get('/Categorias', 'Controller@getData');
Route::get('/Detalles', 'Controller@getDetalles');
Route::post('/insertarDetalle', 'Controller@insertarDetalle');
Route::get('/editar/{id}', 'Controller@editar');
Route::get('/editarDetalle/{id}', 'Controller@editarDetalle');

Route::post('/hacerEditar/{id}', 'Controller@hacerEditar');
Route::post('/hacerEditarDetalle/{id}', 'Controller@hacerEditarDetalle');

Route::post('/insertar', 'Controller@insertar');
Route::get('/eliminarDetalle/{id}', 'Controller@eliminarDetalle');
Route::get('/eliminar/{id}', 'Controller@eliminar');
