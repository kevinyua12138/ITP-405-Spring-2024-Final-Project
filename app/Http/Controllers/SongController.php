<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Auth;

class SongController extends Controller
{
    public function index(){
        $songs = Song::with(['artist'])->get();

        return view('/song/songs', [
            'songs' => $songs,
        ]);
    }

    public function show($songId)
    {
        $song = Song::with(['artist', 'comments.user'])->find($songId);
        return view('/song/details', [
            'song' => $song,
        ]);
    }
    
    public function addToFavorites(Song $songId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!$user->favorites()->find($songId)) {
                $user->favorites()->attach($songId);
                return back()->with('success', 'Song added to favorites.');
            } else {
                return back()->with('error', 'This song is already in your favorites.');
            }
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }
    }

    public function removeFromFavorites(Song $songId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->favorites()->find($songId)) {
                $user->favorites()->detach($songId);
                return back()->with('success', 'Song removed from favorites.');
            } else {
                return back()->with('error', 'Song was not in favorites.');
            }
        } else {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }
    }
}
