<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::post('/', [UserController::class, 'store'])->name('user.store');

// Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
// Route::post('/update', [UserController::class, 'update'])->name('user.update');


// Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');

// Route::get('/latihan1', function () {
//     return view('latihan1');
// });

// Route::get('/pertemuan3', function () {
//     return view('pertemuan3/pertemuan3'); 
// });

// Route::get('/styling-bootstrap', function () {
//     return view('pertemuan3/styling-bootstrap');
// });



// prefix bisa dianggap pengelompokkan
Route::prefix('/user')
    ->middleware(['auth'])
    ->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
});

Route::prefix('/register')
    ->middleware(['guest'])
    ->group(function () {
    Route::get('/', [UserController::class, 'register'])->name('user.register');
    Route::post('/register_user', [UserController::class, 'register_user'])->name('user.register_user');
});

Route::middleware(['guest'])
    ->group(function () {
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::post('/login_user', [UserController::class, 'login_user'])->name('login_user');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');