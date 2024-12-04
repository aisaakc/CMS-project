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

    Route::post('email', [AuthController::class, 'verifyEmail'])->name('verify.email');

    Route::get('questions/{id}', [AuthController::class, 'questions'])->name('questions');

    Route::post('questions', [AuthController::class, 'verifyQuestions'])->name('verify.questions');
    /*
    Route::post('/token', [AuthController::class, 'Token'])->name('token');

    Route::post('token', [AuthController::class, 'verifyToken'])->name('verify.token'); */
});

// PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    Route::get('index', function () {
        return view('dashboard.index');
    })->name('dashboard');
});
