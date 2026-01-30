<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/gerer', function () {
    return view('gerer');
});


Route::get('/', [RecetteController::class, 'statistique'])->name('home');
Route::post('/', [RecetteController::class, 'search'])->name('search');

Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/recettes/gestion', [UserController::class, 'index'])->name('recettes.gestion');

Route::get('/recette/add', [RecetteController::class, 'create'])->name('recette.create');
Route::post('/recette/add', [RecetteController::class, 'store'])->name('recette.store');
Route::get('/recette/{id}', [RecetteController::class, 'show'])->name('recette.show');
Route::delete('/recette/{id}', [RecetteController::class, 'destroy'])->name('recette.destroy');
Route::put('/recette/edit/{id}', [RecetteController::class, 'edit'])->name('recette.edit');
Route::post('/comment/store', [CommentaireController::class, 'store'])->name('comment.store');
Route::get('/gestion', [UserController::class, 'index'])->name('gestion');
Route::put('/comment/update/{id}', [CommentaireController::class, 'update'])->name('comment.update');
Route::delete('/comment/destroy/{id}', [CommentaireController::class, 'destroy'])->name('comment.destroy');
