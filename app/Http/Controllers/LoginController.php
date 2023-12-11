<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('login.login',[
            'title' => 'Login'
        ]);

    }


    public function authenticate(Request $request) {
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->level == 'admin') {
                return redirect()->intended('/admin');
            } elseif ($user->level == 'user') {
                return redirect()->intended('/kuliner');
            }
        
        }


        return back()->with('loginError','Login Failed');

    }


    public function logout(Request $request){
        if(Auth::logout());

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
