<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/**
 * Guest Routes
 */
Route::middleware('guest')->group(function () {
    Route::get('/', function () { return view('welcome'); })->name('home');
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

/**
 * Authenticated Routes
 */
Route::middleware('auth')->group(function () {
    Route::get('/', [LinkController::class, 'index'])->name('home');
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');


});
