<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    //if admin, e is allowed to look at all current accounts and delete accounts when viewing profile
    public function index(){
        $users = User::where('email', '!=', 'admin@gmail.com')->get();
        return view('profile/index', [
            'user' => Auth::user(),
            'users' => $users,
        ]);
    }

    // display favourites tab
    public function user_favorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->with(['artist'])->orderBy('pivot_created_at', 'desc')->get();
        return view('profile/favorites', ['favorites' => $favorites]);
    }

    // delete users
    public function delete($userId) 
    {
        if (Auth::check() && Auth::user()->email === 'admin@gmail.com') {
            $user = User::find($userId);
            $user->delete();
            return redirect()->route('profile.index')->with('success', 'User deleted successfully.');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

}
