<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\FechasActividadController;
use App\Http\Controllers\BloqueController;
use App\Http\Controllers\GuiaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;




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
// En web.php
Route::post('/actualizar-descripcion', [ActividadController::class, 'actualizarDescripcion'])->name('actualizar_descripcion');

//Route::get('/paginaDespuesDeGuardar', [Controller::class, 'paginaDespuesDeGuardar'])->name('paginaDespuesDeGuardar');
Route::get('/paginaDespuesDeGuardar', [ActividadController::class, 'paginaDespuesDeGuardar'])->name('paginaDespuesDeGuardar');

Route::get('/mostrarCalendarioDiasHabiles', [ActividadController::class, 'mostrarCalendarioDiasHabiles'])->name('mostrarCalendarioDiasHabiles');
Route::get('/', [ActividadController::class, 'mostrarCalendarioDiasHabiles']);

Route::get('/accion-dia/{fecha}', [ActividadController::class, 'accionDia'])->name('accion-dia');

Route::get('/reserva/{cod_bloque}/{cod_actividad}/{fecha}', [ReservaController::class, 'reserva'])->name('reserva');

Route::post('/formulario/enviar/{cod_bloque}/{cod_actividad}/{fecha}', [FormularioController::class, 'enviarFormulario']);

Route::get('/login', [Controller::class, 'login'])->name('login');

Route::post('/usuarios/autenticar', [UserController::class, 'autenticar'])->name('autenticar');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/administradores', [Controller::class, 'administradoresIndex'])->name('administradoresIndex');

Route::get('/instituciones', [InstitucionController::class, 'instituciones'])->name('instituciones');
Route::get('/encargados', [EncargadoController::class, 'encargados'])->name('encargados');
Route::get('/fechasActividad', [FechasActividadController::class, 'fechasActividad'])->name('fechasActividad');
Route::get('/actividades', [ActividadController::class, 'actividades'])->name('actividades');
Route::get('/bloques', [BloqueController::class, 'bloques'])->name('bloques');
Route::get('/guias', [GuiaController::class, 'guias'])->name('guias');
Route::get('/grupos', [GrupoController::class, 'grupos'])->name('grupos');
Route::get('/reservas', [ReservaController::class, 'reservas'])->name('reservas');











