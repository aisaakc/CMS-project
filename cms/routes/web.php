<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicadorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersController;


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

// Profile

Route::get('edit-profile', function () {
    return view('vistas.edit-profile');
})->name('edit-profile');

Route::get('update-profile', [AuthController::class, 'updateProfile'])->name('update.profile');
Route::post('/update-profile-picture', [AuthController::class, 'updateProfilePicture'])->name('update.profile.picture');
Route::delete('/delete-account', [AuthController::class, 'destroy'])->name('delete.account');

// PUBLICATIONS

Route::get('blog/listBlog', [PublicationController::class, 'listaBlog'])->name('publications');
Route::get('blog/{id}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
Route::put('blog/{id}', [PublicationController::class, 'update'])->name('publications.update'); // Define la ruta publications.update
Route::get('blog/create', [PublicationController::class, 'create'])->name('publications.create'); // Ruta para crear una nueva publicación
Route::post('blog', [PublicationController::class, 'store'])->name('publications.store'); // Ruta para almacenar la nueva publicación
Route::get('blog/show/{id}', [PublicationController::class, 'show'])->name('publications.show'); // Ruta para visualizar una publicación
Route::delete('blog/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');

// cantidad
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



//PAGES
Route::resource('pages', PageController::class);

//users
Route::resource('users', UsersController::class);
