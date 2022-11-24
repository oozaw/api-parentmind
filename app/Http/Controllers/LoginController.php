<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        return view('login.index', [
            "title" => "Login",
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('loginSuccess', 'Login sucessfull. Welcome back, ' . auth()->user()->name);
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('logoutSuccess', 'Logout successfull, please login!');
    }
}