<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatePostController extends Controller
{
    public function view() {
        $user = Auth::user();
        $courses = courses::all();

        return view('createPost', compact('user', 'courses'));
    }
}
