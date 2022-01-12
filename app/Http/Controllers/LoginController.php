<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view() {
        return view('login');
    }

    public function login_process(Request $request) {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $rememberMe = $request->hasAny('remember');

        if (Auth::attempt($user, $rememberMe)) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors('Invalid Email or Password');
    }
}
