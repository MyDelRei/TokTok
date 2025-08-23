<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes by role
Route::middleware([RoleMiddleware::class.':admin'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'userList'])->name('userList');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');

        Route::get('/print-preview', [UserController::class, 'printPreview'])->name('print.preview');
        Route::get('/print-pdf', [UserController::class, 'printPdf'])->name('print.pdf');

        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
        
    });

    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BookController::class, 'bookList'])->name('bookList');
        Route::get('/create', [BookController::class, 'create'])->name('create');
        Route::post('/store', [BookController::class, 'store'])->name('store');
    
        // Show the edit form
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
        // Update the book stock
        Route::put('/{book}', [BookController::class, 'update'])->name('update');
        // Delete the book
        Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');
    });
    
});


Route::middleware([RoleMiddleware::class.':member'])->group(function () {
    Route::view('/member', 'member')->name('member');
   

});