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
Route::get('/dietista/crearcliente', 'UsuarioController@crearclientes');
Route::get('/dietista/activarcliente', 'UsuarioController@activarcliente');
Route::get('/dietista/eliminarcliente', 'UsuarioController@eliminarcliente');
Route::get('/dietista/consultarcitas', 'CitaController@consultarcitas');
Route::get('/dietista/crearcitas', 'CitaController@crearcitas');
Route::get('/dietista/cambiarestadocitas', 'CitaController@cambiarestadocitas');
Route::get('/dietista/eliminarcita', 'CitaController@eliminarcita');
Route::get('/dietista/completarcitas', 'CitaController@completarcitas');
Route::get('/dietista/evolucion', 'CitaController@amosarevolucion');
Route::get('/dietista/creardietas', 'DietaController@creardietas');
Route::get('/dietista/consultardietas', 'DietaController@consultardietas');
Route::get('/dietista/engadiralimento', 'AlimentoController@engadirAlimento');
Route::get('/dietista/asignardietas', 'DietausuarioController@asignardietas');
Route::get('/dietista/cambiarestadodietas', 'DietaController@cambiarestadodietas');
Route::get('/cliente', 'CitaController@clienteconsultarcitas');
Route::get('/cliente/cliente', 'CitaController@clienteconsultarcitas');
Route::get('/cliente/evolucion', 'CitaController@clienteevolucion');
Route::get('/cliente/consultardietas', 'DietaController@clienteconsultardietas');
Route::get('ingresoincorrecto', function () {return view('ingresoincorrecto');});
Route::post('/', 'UsuarioController@login_usuario');
Route::post('/admin/creardietista', 'UsuarioController@store');
Route::post('/admin/activardietista', 'UsuarioController@activarusuario');
Route::post('/admin/eliminardietista', 'UsuarioController@eliminarusuario');
Route::post('/dietista/crearcliente', 'UsuarioController@creacliente');
Route::post('/dietista/activarcliente', 'UsuarioController@activarusuario');
Route::post('/dietista/eliminarcliente', 'UsuarioController@eliminarusuario');
Route::post('/dietista/crearcitas', 'CitaController@store');
Route::post('/dietista/cambiarestadocitas', 'CitaController@cambiaestadocitas');
Route::post('/dietista/eliminarcita', 'CitaController@eliminacita');
Route::post('/dietista/completarcitas', 'CitaController@completacitas');
Route::post('/dietista/creardietas', 'DietaController@creaDieta');
Route::post('/dietista/engadiralimento', 'AlimentoController@engadeAlimento');
Route::post('/dietista/asignardietas', 'DietausuarioController@store');
Route::post('/dietista/cambiarestadodietas', 'DietaController@cambiaestadodieta');

Route::fallback(function () {return view('ingresoincorrecto');});