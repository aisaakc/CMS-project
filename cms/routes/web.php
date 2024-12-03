<?php

use App\Models\Nacionalidad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('auth.layout');
});

// AUTH
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::get('register', [AuthController::class,'showForm'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify']);
    Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');
});

// PROTECTED ROUTES
Route::prefix('auth')->group(function () {
    Route::get('index', function () {
        return view('dashboard.index');
    })->name('dashboard');
});
