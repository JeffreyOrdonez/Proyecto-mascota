<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\RefugioWebController;
use App\Http\Controllers\UsuarioController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// CRUD Mascotas
Route::resource('mascotas', MascotaController::class);

// CRUD Refugios (versión web)
Route::prefix('refugios')->group(function () {
    Route::get('/', [RefugioWebController::class, 'index'])->name('web.refugios.index');
    Route::get('/create', [RefugioWebController::class, 'create'])->name('web.refugios.create');
    Route::post('/', [RefugioWebController::class, 'store'])->name('refugios.store');
    Route::get('/{id}', [RefugioWebController::class, 'show'])->name('refugios.detalle');
    Route::get('/{id}/edit', [RefugioWebController::class, 'edit'])->name('refugios.edit');
    Route::put('/{id}', [RefugioWebController::class, 'update'])->name('refugios.update');
    Route::delete('/{id}', [RefugioWebController::class, 'destroy'])->name('refugios.destroy');
});

// CRUD Usuarios
Route::resource('usuarios', UsuarioController::class);
require __DIR__.'/auth.php';
