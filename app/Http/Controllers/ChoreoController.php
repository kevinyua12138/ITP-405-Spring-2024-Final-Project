<?php

namespace App\Http\Controllers;
use App\Models\Song;
use App\Models\User;
use App\Models\Choreography;

use Illuminate\Http\Request;


class ChoreoController extends Controller
{
    public function add($songId)
    {
        $song = Song::find($songId);
        $dancers = User::where('email', '!=', 'admin@gmail.com')->get();
        return view('song/choreographyCreate', [
            'song' => $song,
            'dancers' => $dancers
        ]);
    }

    public function store(Request $request, $songId)
    {
        $request->validate([
            'dancer1_id' => 'nullable|exists:users,id',
            'dancer2_id' => 'nullable|exists:users,id',
            'dancer3_id' => 'nullable|exists:users,id',
            'dancer4_id' => 'nullable|exists:users,id',
            'dancer5_id' => 'nullable|exists:users,id',
        ]);

        $choreography = new Choreography();
        $choreography->song_id = $songId;
        $choreography->dancer1_id = $request->input('dancer1_id');
        $choreography->dancer2_id = $request->input('dancer2_id');
        $choreography->dancer3_id = $request->input('dancer3_id');
        $choreography->dancer4_id = $request->input('dancer4_id');
        $choreography->dancer5_id = $request->input('dancer5_id');

        $choreography->save();

        return redirect()->route('song.show', ['songId' => $songId])
                     ->with('success', 'Choreography added successfully!');

    }
}
