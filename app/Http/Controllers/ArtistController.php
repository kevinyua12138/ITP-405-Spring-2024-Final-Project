<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function show($artistId)
    {
        $artist = Artist::with(['songs']) ->find($artistId);
        return view('artist/artist', [
            'artist' => $artist,
        ]);
    }

    public function create()
    {
        return view('artist/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:artists,name',
        ]);

        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->save();

        return redirect()->route('song.create')
            ->with('success', "Successfully created artist \"{$artist->name}\"");
    }
    
}
