<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('todos')->name('todos.')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('index');
});
