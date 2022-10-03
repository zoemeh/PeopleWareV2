<?php

use App\Http\Livewire\SimpleTable;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SimpleTabe;
use App\Models\Idioma;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name( 'homelogout');
Route::get('/reportes', [App\Http\Controllers\Reportes::class, 'index'])->name('reportes.index');
Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil');
Route::get('/aplicar/{puesto}', [App\Http\Controllers\HomeController::class, 'aplicar'])->name('aplicar');

Route::resource('/competencias', App\Http\Controllers\CompetenciaController::class)->middleware('auth');
Route::resource('/idiomas', App\Http\Controllers\IdiomaController::class)->middleware('auth');
Route::resource('/capacitaciones', App\Http\Controllers\CapacitacionController::class)->middleware('auth');
Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class)->middleware('auth');
Route::resource('/puestos', App\Http\Controllers\PuestoController::class)->middleware('auth');
Route::resource('/candidatos', App\Http\Controllers\CandidatoController::class)->middleware('auth');
Route::resource('/empleados', App\Http\Controllers\EmpleadoController::class)->middleware('auth');
Route::resource('/personas', App\Http\Controllers\PersonaController::class)->middleware('auth');
Route::resource('/usuarios', App\Http\Controllers\UsuariosController::class)->middleware('auth');

Route::get('/puestos/proceso/{puesto}', [App\Http\Controllers\PuestoController::class, 'proceso'])->name('puestos.proceso');

