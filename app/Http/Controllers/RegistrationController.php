<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    public function index(){
        return view('registration/index');
    }

    public function register(Request $request){
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']); //B22rypt
        $user->save();

        Auth::login($user);

        return redirect()->route('profile.index');
    }
}
