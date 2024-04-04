<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('profile/index', [
            'user' => Auth::user(),
        ]);
    }

    public function user_favorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->with(['artist'])->orderBy('pivot_created_at', 'desc')->get();
        return view('profile/favorites', ['favorites' => $favorites]);
    }
}
