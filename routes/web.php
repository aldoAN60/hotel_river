<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PendientesController;
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

Route::view('/', '/inicio')->name('inicio');

Route::view('/pendientes', '/pendientes')->name('pendientes');
// Route::post('/guardar',[HomeController::class,'create'])->name('guardar');
// Route::get('/register_show',[RegisterController::class,'show'])->name('register.show');



Route::get('/pendientes',[PendientesController::class,'mostrar_pendientes'])->name('pendientes.mostrar');
Route::get('/pendiente_buscar',[PendientesController::class,'busqueda_pendiente'])->name('pendientes.busqueda');



Route::post('/pendientes-guardar', [PendientesController::class,'guardar_pendiente'])->name('pendientes.guardar');
Route::patch('/pendientes-confirmar/{id}', [PendientesController::class,'actualizar_pendiente'])->name('pendientes.confirmar');
Route::delete('/pendientes-eliminar/{pendiente}', [PendientesController::class,'eliminar_pendiente'])->name('pendientes.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
