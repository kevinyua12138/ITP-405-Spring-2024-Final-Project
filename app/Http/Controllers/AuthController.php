<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        // redirect
        return redirect()->route('login');
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
            return redirect()->route('profile.index');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
}
