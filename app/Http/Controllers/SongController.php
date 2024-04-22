<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
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

    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        return view('song/create',['artists' => $artists]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'artist' => 'required|exists:artists,id',
        ]);

        $song = new Song();
        $song->name = $request->input('name');
        $song->artistId = $request->input('artist');
        $song->save();

        $artistName = Artist::find($request->input('artist'))->name;

        return redirect()->route('songs.index')
            ->with('success', "Successfully created \"{$song->name}\" by \"{$artistName}\"");
    }
    public function delete($songId)
    {
        $song = Song::find($songId);
        $song->delete();
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
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

    public function editTitle($songId)
    {
        $song = Song::find($songId);
        return view('song/edit-title', ['song' => $song]);
    }

    public function updateTitle(Request $request, $songId)
    {
        $request->validate(['name' => 'required|string']);
        $song = Song::find($songId);
        $song->name = $request->name;
        $song->save();

        return redirect()->route('song.show', ['songId' => $songId])->with('success', 'Song title updated successfully.');
    }

    public function editArtist($songId)
    {
        $song = Song::find($songId);
        $artists = Artist::orderBy('name')->get();
        return view('song/edit-artist',[
            'song' => $song,
            'artists' => $artists
        ]);
    }


public function updateArtist(Request $request, $songId)
    {
        $request->validate(['artist' => 'required|exists:artists,id']);
        $song = Song::find($songId);
        $song->artistId = $request->artist;
        $song->save();

        return redirect()->route('song.show', ['songId' => $songId])->with('success', 'Song title updated successfully.');
    }
}
