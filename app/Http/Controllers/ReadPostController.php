<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\posts;
use App\Models\reads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadPostController extends Controller
{
    public function view() {
        $user = Auth::user();
        $courses = courses::all();

        $allPosts = posts::all();
        $bookmarkPosts = reads::where('users_id', $user->id)->orderBy('id', 'desc')->get();
        

        return view('bookmarkpost', compact('user', 'courses', 'bookmarkPosts'));
    }
}
