<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoriaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/categorias', [ApiCategoriaController::class, 'index']);
Route::post('/categorias', [ApiCategoriaController::class, 'store']);
Route::get('/categorias/{id}', [ApiCategoriaController::class, 'show']);
Route::put('/categorias/{id}', [ApiCategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [ApiCategoriaController::class, 'destroy']);