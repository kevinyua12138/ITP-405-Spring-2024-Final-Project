<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ChoreoController;

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
Route::get('/artist/{artistId}', [ArtistController::class, 'show'])->name('artist.show');
Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/favoriteSongs', [ProfileController::class, 'user_favorites'])->name('profile.favorites');
    Route::post('/songs/{songId}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{commentId}', [CommentController::class, 'edit'])->name('comments.edit');
    Route::post('/comments/{commentId}', [CommentController::class, 'update'])->name('comments.update');
    Route::post('/comments/{commentId}/delete', [CommentController::class, 'delete'])->name('comments.delete');
    Route::post('/song/{songId}/favorite', [SongController::class, 'addToFavorites'])->name('song.favorite');
    Route::post('/song/{songId}/unfavorite', [SongController::class, 'removeFromFavorites'])->name('song.unfavorite');
    Route::get('/songs/{songId}/choreography', [ChoreographyController::class, 'index'])->name('choreography.index');
    Route::get('/songs/create', [SongController::class, 'create'])->name('song.create');
    Route::post('/songs/store', [SongController::class, 'store'])->name('song.store');
    Route::post('/songs/delete/{songId}', [SongController::class, 'delete'])->name('song.delete');
    Route::get('/artists/create', [ArtistController::class, 'create'])->name('artist.create');
    Route::post('/artists/store', [ArtistController::class, 'store'])->name('artist.store');
    Route::post('/user/delete/{userId}', [ProfileController::class, 'delete'])->name('user.delete');
    Route::get('/songs/{songId}/edit-title', [SongController::class, 'editTitle'])->name('songs.edit.title');
    Route::post('/songs/{songId}/update-title', [SongController::class, 'updateTitle'])->name('songs.update.title');
    Route::get('/songs/{songId}/edit-artist', [SongController::class, 'editArtist'])->name('songs.edit.artist');
    Route::post('/songs/{songId}/update-artist', [SongController::class, 'updateArtist'])->name('songs.update.artist');
    Route::get('/song/{songId}', [SongController::class, 'show'])->name('song.show');
    Route::get('/songs/{songId}/choreography', [ChoreoController::class, 'add'])->name('choreography.add');
    Route::post('/songs/{songId}/choreography', [ChoreoController::class, 'store'])->name('choreography.store');
});


Route::get('/artist/{artistId}', [ArtistController::class, 'show'])->name('artist.show');