<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return redirect()->route('page.main');
})->name('base');

// main page
Route::get('/main', function (){
    return view('main.main');
})->name('page.main');

// register
Route::get('/register', function () {
    return view('authentication.register');
});
Route::post('/register/user', [RegisterController::class,'register'])->name('user.register');

// login
Route::get('/login', function () {
    return view('authentication.login');
});
Route::post('/login/user', [LoginController::class,'login'])->name('user.login');

// profile
Route::get('/profile/{user_id}', [ProfileController::class, 'show']);
Route::get('/profile/{user_id}/edit', [ProfileController::class, 'showEdit']);

// project
Route::get('/project/create', [ProjectController::class, 'showCreate']);
Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');


// user routes
Route::get('/index', [UserController::class, 'index'])->name('user.index');
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users/create', [UserController::class,'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [UserController::class,'edit']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'delete']);


