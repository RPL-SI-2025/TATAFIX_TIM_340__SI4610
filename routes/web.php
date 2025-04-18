<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TukangController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/profiletukang', [TukangController::class, 'index'])->name('tukang.index');
Route::get('/profiletukang/{id}/edit', [TukangController::class, 'edit'])->name('tukang.edit');
Route::put('/profiletukang/{id}', [TukangController::class, 'update'])->name('tukang.update');