<?php

use App\Models\Nacionalidad;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('auth.layout');
});

// AUTH
Route::prefix('auth')->group(function () {
    Route::post('register/verify', [AuthController::class, 'registerVerify'])->name('register.verify');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::get('register', [AuthController::class, 'showForm'])->name('register');
    Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');
    Route::get('verify', [AuthController::class, 'verify'])->name('verify');
});

// PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    Route::get('index', function () {
        return view('dashboard.index');
    })->name('dashboard');
});
