<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/recette', function () {
    return view('recette');
});

route::get('/gerer', function () {
    return view('gerer');
});

route::get('/edit', function () {
    return view('edit');
});

Route::get('/error', function () {
    return view('error');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/recette/add', [RecetteController::class, 'create'])->name('recette.add');
Route::post('/recette/store', [RecetteController::class, 'store'])->name('recette.add');
