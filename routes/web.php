<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\RefugioWebController;
use App\Http\Controllers\UsuarioController;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil (solo autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD Mascotas
Route::resource('mascotas', MascotaController::class);

// CRUD Refugios (versión web)
Route::middleware('auth')->prefix('refugios')->group(function () {
    Route::get('/', [RefugioWebController::class, 'index'])->name('web.refugios.index');
    Route::get('/create', [RefugioWebController::class, 'create'])->name('web.refugios.create');
    Route::post('/', [RefugioWebController::class, 'store'])->name('web.refugios.store');
    Route::get('/{id}', [RefugioWebController::class, 'show'])->name('web.refugios.detalle');
    Route::get('/{id}/edit', [RefugioWebController::class, 'edit'])->name('web.refugios.edit');
    Route::put('/{id}', [RefugioWebController::class, 'update'])->name('web.refugios.update');
    Route::delete('/{id}', [RefugioWebController::class, 'destroy'])->name('web.refugios.destroy');
});

// CRUD Usuarios
Route::resource('usuarios', UsuarioController::class);

require __DIR__.'/auth.php';
