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
Route::get('/admin', 'UsuarioController@consultardietistas');
Route::get('/admin/creardietista', function () {return view('admin/creardietista');});
Route::get('/admin/admin', 'UsuarioController@consultardietistas');
Route::get('/admin/activardietista', 'UsuarioController@activardietista');
Route::get('/admin/eliminardietista', 'UsuarioController@eliminardietista');
Route::get('ingresoincorrecto', function () {return view('ingresoincorrecto');});
Route::post('/', 'UsuarioController@login_usuario');
Route::post('/admin/creardietista', 'UsuarioController@store');
Route::post('/admin/activardietista', 'UsuarioController@activarusuario');
Route::post('/admin/eliminardietista', 'UsuarioController@eliminarusuario');
Route::fallback(function () {return view('ingresoincorrecto');});