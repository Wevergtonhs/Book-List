<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/details/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/get-titles', [BookController::class, 'getTitles'])->name('get.titles');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{id}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{id}/delete', [BookController::class, 'destroy'])->name('book.delete');
