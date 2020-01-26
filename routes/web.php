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
Route::get('/', function () {return view('welcome');});
Route::get('ingresoincorrecto', function () {return view('ingresoincorrecto');});
Route::get('/admin/admin', function () {return view('admin/admin');});
Route::get('/admin', function () {return view('admin/admin');});
Route::get('/admin/creardietista', function () {return view('admin/creardietista');});
//Route::get('/admin/creardietista', 'PaxinasController@envia_crear_dietista');
Route::post('/', 'UsuarioController@login_usuario');
Route::post('/admin/creardietista', 'UsuarioController@store');
Route::fallback(function () {return view('ingresoincorrecto');});