<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentaireController;
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


Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/recette/add', [RecetteController::class, 'create'])->name('recette.create');
Route::post('/recette/add', [RecetteController::class, 'store'])->name('recette.store');
Route::get('/recette/{id}', [RecetteController::class, 'show'])->name('recette.show');
Route::post('/recette', [RecetteController::class, 'destroy'])->name('recette.delete');
Route::post('/recette/edit', [RecetteController::class, 'update'])->name('recette.edit');
Route::post('/comment/store', [CommentaireController::class, 'store'])->name('comment.store');

Route::put('/comment/update/{id}', [CommentaireController::class, 'update'])->name('comment.update');
Route::put('/comment/destroy/{id}', [CommentaireController::class, 'destroy'])->name('comment.destroy');
Route::post('/gerer', [RecetteController::class, 'gerer'])->name('gerer');
