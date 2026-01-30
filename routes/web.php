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



Route::get('/', [RecetteController::class, 'statistique'])->name('home');
Route::post('/', [RecetteController::class, 'search'])->name('search');

Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/recettes/gerer', [UserController::class, 'index'])->name('recettes.gerer');

Route::get('/recettes/create', [RecetteController::class, 'create'])->name('recettes.create');
Route::post('/recettes/create', [RecetteController::class, 'store'])->name('recettes.store');
Route::get('/recettes/{id}', [RecetteController::class, 'show'])->name('recettes.show');
Route::delete('/recettes/{id}', [RecetteController::class, 'destroy'])->name('recettes.destroy');
Route::put('/recettes/edit/{id}', [RecetteController::class, 'edit'])->name('recettes.edit');
Route::post('/recettes/{id}/comments', [CommentaireController::class, 'store']);
Route::put('/recettes/{id_recette}/comments/update/{id}', [CommentaireController::class, 'update']);
Route::delete('/recettes/{id_recette}/comments/{id}', [CommentaireController::class, 'destroy']);
