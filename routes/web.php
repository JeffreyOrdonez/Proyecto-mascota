<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefugioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/refugios', [RefugioController::class, 'index']);
