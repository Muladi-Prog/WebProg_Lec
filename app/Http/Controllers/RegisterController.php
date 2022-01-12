<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function view() {
        $user = Auth::user();

        if ($user) {
            return redirect('/');
        }

        return view('register');
    }

    public function register_process(Request $request) {
        $newUser = $request->validate([
            'name' => 'required|min:4',
            'gender' => 'required',
            'dob' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $newUser['name'],
            'gender' => $newUser['gender'],
            'dob' => $newUser['dob'],
            'username' => $newUser['username'],
            'email' => $newUser['email'],
            'password' => $newUser['password'],
            'address' => $newUser['address'],
            'gender' => $newUser['gender'],
            'dob' => $newUser['dob'],
            'roles_id' => 1
        ]);

        return redirect('/');
    }
}
