<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
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

    /**
     * Home Authenticated
     */
    Route::get('/', [LinkController::class, 'index'])->name('home');

    /**
     * Links Related Routes
     */
    Route::get('/links/create', [LinkController::class, 'create'])->name('links.create');
    Route::get('/links/{link}/edit', [LinkController::class, 'edit'])->name('links.edit');
    Route::patch('/links/{link}', [LinkController::class, 'update'])->name('links.update');
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
    Route::post('/links', [LinkController::class, 'store'])->name('links.store');

    /**
     * Profile Related Routes
     */
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /**
     * Logout
     */
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

});


/**
 * Authenticated & Guest Routes
 */
Route::get('/{user}', [ProfileController::class, 'show'])->name('profile.show');


