<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::post('/books/{book}/reserve', [BookController::class, 'reserve'])->name('books.reserve');
});

// Usa la classe direttamente invece dell'alias
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/books', [AdminController::class, 'books'])->name('books');
    Route::get('/books/create', [AdminController::class, 'createBook'])->name('books.create');
    Route::post('/books', [AdminController::class, 'storeBook'])->name('books.store');
    Route::get('/books/{book}/copies', [AdminController::class, 'bookCopies'])->name('books.copies');
    Route::post('/books/{book}/copies', [AdminController::class, 'storeBookCopy'])->name('books.copies.store');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
