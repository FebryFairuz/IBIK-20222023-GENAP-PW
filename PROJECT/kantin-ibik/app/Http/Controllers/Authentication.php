<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    public function index(){
        //echo Hash::make("123456");
        return view('authentications.signin');
    }

    public function authenticate(Request $request):RedirectResponse{
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        //dd("berhasil");

        //$credentials['password'] = Hash::make($credentials['password']);
        //jika berhasil
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); //untuk menghindari session fixation (masuk kedalam celah melalui session sama)
            return redirect()->intended('dashboard');
        }

        //jika gagal
        return back()->with('loginerror','The provided credentials do not match our records.');
    }

    function signout(Request $request):RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/signin');
    }
}
