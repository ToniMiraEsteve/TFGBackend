<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\NinyoController;
use App\Http\Controllers\Api\PDFController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RespuestaController;


Route::post('login', [AuthController::class, 'login'])->middleware('api');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum','api');
Route::post('register', [AuthController::class, 'register'])->middleware('api');

Route::middleware(['auth:sanctum','api'])->group( function () {    
    Route::apiResource('eventos', EventoController::class);
    Route::apiResource('ninyo', NinyoController::class);
    Route::apiResource('pdf', PDFController::class);
    Route::apiResource('post', PostController::class);
    Route::apiResource('respuesta', RespuestaController::class);

    Route::get('/posts/{post}/respuestas', [RespuestaController::class, 'getByPost']);
    Route::put('/respuestas/{respuesta}', [RespuestaController::class, 'update']);
    Route::delete('/respuestas/{respuesta}', [RespuestaController::class, 'destroy']);
});

