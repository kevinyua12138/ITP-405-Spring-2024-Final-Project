<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function show($artistId)
    {
        $artist = Artist::with(['songs']) ->find($artistId);
        return view('/artist', [
            'artist' => $artist,
        ]);
    }
}
