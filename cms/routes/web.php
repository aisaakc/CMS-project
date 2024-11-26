<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// AUTH
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify']);
});

// PROTECTED ROUTES
Route::middleware('auth')->group(function() {
    Route::get('dashboard', function() {
        return 'Aquí Ary va a hacer su dashboard todo lindo y bonito :D';
    })->name('dashboard');
});
