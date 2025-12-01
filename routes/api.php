<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\RefugioController; // <-- ¡Importa el controlador de API!
use App\Http\Controllers\Api\UserController;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('refugios', RefugioController::class);

// (Esta línea de auth:sanctum puede estar o no, no importa)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth endpoints for token issuing and revocation
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::apiResource('users', UserController::class);