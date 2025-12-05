<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// 👇 RUTAS TEMPORALES DE DISEÑO (Bórralas cuando tu amigo suba el backend)
Route::middleware(['auth'])->group(function () {

    // Ruta para ver tu diseño de Refugios
    Route::view('/diseño/refugios', 'refugios.index')->name('refugios.index');

    // Ruta para ver tu diseño de Crear Mascota
    Route::view('/diseño/mascotas/crear', 'mascotas.create')->name('mascotas.create');

});

require __DIR__.'/auth.php';
