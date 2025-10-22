<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [BookController::class, 'index'])->name('index');
Route::get('/add-rating', [BookController::class, 'create'])->name('create');
