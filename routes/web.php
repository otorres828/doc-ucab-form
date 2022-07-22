<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Sistema\CategorySistemaController;
use App\Http\Controllers\Sistema\SistemaController;
use App\Http\Controllers\Sistema\ManualSistemaController;
use App\Http\Controllers\Usuario\CategoryUsuarioController;
use App\Http\Controllers\Usuario\ManualUsuarioController;
use App\Http\Controllers\Usuario\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('manual-sistema/{slug}',[SistemaController::class,'show'])->name('sistema_show');
Route::get('manual-sistema/',[SistemaController::class,'principal'])->name('manual.sistema.principal');
Route::resource('programador/manual-sistema', ManualSistemaController::class)->except('show')->middleware('auth')->names('manual.sistema');
Route::resource('programador/manual-sistema/categorias', CategorySistemaController::class)->except('show')->middleware('auth')->names('category');

Route::get('manual-usuario/{slug}',[UsuarioController::class,'show'])->name('usuario_show');
Route::get('manual-usuario/',[UsuarioController::class,'principal'])->name('manual.usuario.principal');
Route::resource('programador/manual-usuario', ManualUsuarioController::class)->except('show')->middleware('auth')->names('manual.usuario');
Route::resource('programador/manual-usuario/categorias', CategoryUsuarioController::class)->except('show')->middleware('auth')->names('manual.usuario.categoria');


Route::post('images/upload', [ImageController::class,'upload'])->name('images.upload');