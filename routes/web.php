<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArtistController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('/home');
})->name('home');
Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/songs', [SongController::class, 'index'])->name('songs.index');
Route::get('/song/{songId}', [SongController::class, 'show'])->name('song.show');
Route::get('/artist/{artistId}', [ArtistController::class, 'show'])->name('artist.show');
Route::post('/song/{songId}/favorite', [SongController::class, 'addToFavorites'])->name('song.favorite');
Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/favoriteSongs', [ProfileController::class, 'user_favorites'])->name('profile.favorites');
    Route::post('/songs/{songId}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/songs/{songId}/comments/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::post('/song/{songId}/unfavorite', [SongController::class, 'removeFromFavorites'])->name('song.unfavorite');
});