<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PresentacioneController;
use App\Http\Controllers\ProovedoreController;
use App\Models\Presentacione;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('medicamentos',MedicamentoController::class);
Route::resource('categorias',CategoriaController::class);
Route::resource('presentaciones',PresentacioneController::class);
Route::resource('laboratorios',LaboratorioController::class);
Route::resource('proveedores',ProovedoreController::class);
Route::resource('almacenes',AlmacenController::class);

