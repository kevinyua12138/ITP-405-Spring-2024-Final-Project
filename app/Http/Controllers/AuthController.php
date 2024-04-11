<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function loginForm(){
        return view('auth/login');
    }

    public function login(Request $request){
        $wasLoginSuccesful = Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        if($wasLoginSuccesful){
            return redirect()->route('songs.index');
        }

        return redirect()->route('login')->withInput()->with('error', 'Invalid credentials');
    }
}
