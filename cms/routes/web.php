<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('cms.HomePage');
})->name('HomePage');

Route::get('Blog', function () {
    return view('cms.Blog');
})->name('Blog');

Route::get('SobreNosostros', function () {
    return view('cms.SobreNosostros');
})->name('SobreNosostros');

Route::get('Contactanos', function () {
    return view('cms.Contactanos');
})->name('Contactanos');



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

    Route::get('questions', [AuthController::class, 'questions'])->name('questions');

    Route::post('questions/verify', [AuthController::class, 'verifyQuestions'])->name('verify.questions');

    Route::get('/token', [AuthController::class, 'Token'])->name('token');

    Route::post('token/verify', [AuthController::class, 'verifyToken'])->name('verify.token');

    Route::post('NewPass', [AuthController::class, 'NewPass'])->name('new.pass');
});

// PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('vistas.dashboard');
    })->name('dashboard');
});
