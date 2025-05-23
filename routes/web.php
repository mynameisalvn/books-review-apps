<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'index'])->name('index');

// Top 10 Authors Page
Route::get('/authors/top', [AuthorController::class, 'top'])->name('authors.top');


// Rating Input Page + Submit
Route::get('/rating', [RatingController::class, 'create'])->name('rating.create');
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store');