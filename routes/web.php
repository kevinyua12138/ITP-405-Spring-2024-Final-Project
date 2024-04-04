<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/song/{songId}', [SongController::class, 'show'])->name('song.show');
Route::post('/song/{songId}/favorite', [SongController::class, 'addToFavorites'])->name('song.favorite');
Route::post('/song/{songId}/unfavorite', [SongController::class, 'removeFromFavorites'])->name('song.unfavorite');


Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/favoriteSongs', [ProfileController::class, 'user_favorites'])->name('profile.favorites');
});