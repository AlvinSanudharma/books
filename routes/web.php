<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/add-rating/{book:slug}', [BookController::class, 'create'])->name('create');
Route::post('/store-rating', [BookController::class, 'store'])->name('store');
Route::get('/top-author', [BookController::class, 'topAuthor'])->name('top');
