<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ruta tipo usuario
Route::get('/tipo_usuario', [App\Http\Controllers\TipoUsuarioController::class, 'index']);
Route::get('/tipo_usuario/create', [App\Http\Controllers\TipoUsuarioController::class, 'create']);
Route::get('/tipo_usuario/{tipo_usuario}/edit', [App\Http\Controllers\TipoUsuarioController::class, 'edit']);
Route::post('/tipo_usuario', [App\Http\Controllers\TipoUsuarioController::class, 'sendData']);
Route::put('/tipo_usuario/{tipo_usuario}', [App\Http\Controllers\TipoUsuarioController::class, 'update']);
Route::delete('/tipo_usuario/{tipo_usuario}', [App\Http\Controllers\TipoUsuarioController::class, 'destroy']);

//Propietarios
Route::get('/propietarios', [App\Http\Controllers\PropietarioController::class, 'index']);
Route::get('/propietarios/create', [App\Http\Controllers\PropietarioController::class, 'create']);
Route::get('/propietarios/{propietario}/edit', [App\Http\Controllers\PropietarioController::class, 'edit']);
Route::post('/propietarios', [App\Http\Controllers\PropietarioController::class, 'store']);
Route::put('/propietarios/{propietario}', [App\Http\Controllers\PropietarioController::class, 'update']);
Route::delete('/propietarios/{propietario}', [App\Http\Controllers\PropietarioController::class, 'destroy']);
//arrendatario
Route::get('/arrendatarios', [App\Http\Controllers\ArrendatarioController::class, 'index']);
Route::get('/arrendatarios/create', [App\Http\Controllers\ArrendatarioController::class, 'create']);
Route::get('/arrendatarios/{arrendatario}/edit', [App\Http\Controllers\ArrendatarioController::class, 'edit']);
Route::post('/arrendatarios', [App\Http\Controllers\ArrendatarioController::class, 'store']);
Route::put('/arrendatarios/{arrendatario}', [App\Http\Controllers\ArrendatarioController::class, 'update']);
Route::delete('/arrendatarios/{arrendatario}', [App\Http\Controllers\ArrendatarioController::class, 'destroy']);
//cliente
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index']);
Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create']);
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClienteController::class, 'edit']);
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store']);
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update']);
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy']);

//tipo inmueble
Route::get('/tipo_inmuebles', [App\Http\Controllers\TipoInmuebleController::class, 'index']);
Route::get('/tipo_inmuebles/create', [App\Http\Controllers\TipoInmuebleController::class, 'create']);
Route::get('/tipo_inmuebles/{tipo_inmueble}/edit', [App\Http\Controllers\TipoInmuebleController::class, 'edit']);
Route::post('/tipo_inmuebles', [App\Http\Controllers\TipoInmuebleController::class, 'store']);
Route::put('/tipo_inmuebles/{tipo_inmueble}', [App\Http\Controllers\TipoInmuebleController::class, 'update']);
Route::delete('/tipo_inmuebles/{tipo_inmueble}', [App\Http\Controllers\TipoInmuebleController::class, 'destroy']);

//zonas
Route::get('/zonas', [App\Http\Controllers\ZonaController::class, 'index']);
Route::get('/zonas/create', [App\Http\Controllers\ZonaController::class, 'create']);
Route::get('/zonas/{zona}/edit', [App\Http\Controllers\ZonaController::class, 'edit']);
Route::post('/zonas', [App\Http\Controllers\ZonaController::class, 'store']);
Route::put('/zonas/{zona}', [App\Http\Controllers\ZonaController::class, 'update']);
Route::delete('/zonas/{zona}', [App\Http\Controllers\ZonaController::class, 'destroy']);

//inmuebles
Route::get('/inmuebles', [App\Http\Controllers\InmuebleController::class, 'index']);
Route::get('/inmuebles/create', [App\Http\Controllers\InmuebleController::class, 'create']);
Route::get('/inmuebles/{inmueble}/edit', [App\Http\Controllers\InmuebleController::class, 'edit']);
Route::post('/inmuebles', [App\Http\Controllers\InmuebleController::class, 'store']);
Route::put('/inmuebles/{inmueble}', [App\Http\Controllers\InmuebleController::class, 'update']);
Route::delete('/inmuebles/{inmueble}', [App\Http\Controllers\InmuebleController::class, 'destroy']);

//Publicaciones
Route::get('/', [App\Http\Controllers\PublicacionController::class, 'index']);
// Route::get('/create', [App\Http\Controllers\PublicacionController::class, 'create']);
Route::get('/{inmueble}', [App\Http\Controllers\PublicacionController::class, 'show']);
// Route::get('/{inmueble}/edit', [App\Http\Controllers\PublicacionController::class, 'edit']);
// Route::post('/', [App\Http\Controllers\PublicacionController::class, 'store']);
// Route::put('/{inmueble}', [App\Http\Controllers\PublicacionController::class, 'update']);
// Route::delete('/{inmueble}', [App\Http\Controllers\InmuebleController::class, 'destroy']);

//Contracts
Route::get('/contratos/{inmueble}', [App\Http\Controllers\ContratoController::class, 'contract']);
Route::post('/contratos', [App\Http\Controllers\ContratoController::class, 'registerContract']);

//alquileres
Route::get('/alquileres/lista', [App\Http\Controllers\AlquileresController::class, 'index']);
Route::get('/alquileres/{inmueble_id}', [App\Http\Controllers\AlquileresController::class, 'habilitar']);
//compravetas
Route::get('/contrato/ventascompra', [App\Http\Controllers\CompraventasController::class, 'index']);

//controlador pdf
Route::get('/pdf/generar-pdf/{reserva}', [App\Http\Controllers\PDFController::class, 'generarPDF']);
