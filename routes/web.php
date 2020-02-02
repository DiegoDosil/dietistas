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
Route::get('/dietista', 'UsuarioController@consultarclientes');
Route::get('/dietista/dietista', 'UsuarioController@consultarclientes');
Route::get('/dietista/crearcliente', function () {return view('dietista/crearcliente');});
Route::get('/dietista/activarcliente', 'UsuarioController@activarcliente');
Route::get('/dietista/eliminarcliente', 'UsuarioController@eliminarcliente');
Route::get('/dietista/consultarcitas', 'CitaController@consultarcitas');
Route::get('/dietista/crearcitas', 'CitaController@crearcitas');
Route::get('/dietista/cambiarestadocitas', 'CitaController@cambiarestadocitas');
Route::get('/dietista/eliminarcita', 'CitaController@eliminarcita');
Route::get('/dietista/completarcitas', 'CitaController@completarcitas');
Route::get('/dietista/evolucion', 'CitaController@amosarevolucion');
Route::get('ingresoincorrecto', function () {return view('ingresoincorrecto');});
Route::post('/', 'UsuarioController@login_usuario');
Route::post('/admin/creardietista', 'UsuarioController@store');
Route::post('/admin/activardietista', 'UsuarioController@activarusuario');
Route::post('/admin/eliminardietista', 'UsuarioController@eliminarusuario');
Route::post('/dietista/crearcliente', 'UsuarioController@store');
Route::post('/dietista/activarcliente', 'UsuarioController@activarusuario');
Route::post('/dietista/eliminarcliente', 'UsuarioController@eliminarusuario');
Route::post('/dietista/crearcitas', 'CitaController@store');
Route::post('/dietista/cambiarestadocitas', 'CitaController@cambiaestadocitas');
Route::post('/dietista/eliminarcita', 'CitaController@eliminacita');
Route::post('/dietista/completarcitas', 'CitaController@completacitas');
Route::fallback(function () {return view('ingresoincorrecto');});