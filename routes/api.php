<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->middleware('auth:sanctum');
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('categories')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'create']);
    Route::get('{category}', [CategoryController::class, 'show']);
    Route::patch('{category}', [CategoryController::class, 'update']);
    Route::delete('{category}', [CategoryController::class, 'destroy']);
});

Route::prefix('todos')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::post('/', [TodoController::class, 'create']);
    Route::get('{todo}', [TodoController::class, 'show']);
    Route::patch('{todo}', [TodoController::class, 'update']);
    Route::delete('{todo}', [TodoController::class, 'destroy']);
});
