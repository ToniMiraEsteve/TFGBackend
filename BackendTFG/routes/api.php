<?php
use App\Http\Controllers\Api\AuthController;


Route::post('login', [AuthController::class, 'login'])->middleware('api');
Route::post('register', [AuthController::class, 'register'])->middleware('api');