<?php

namespace App\Http\Controllers;

use App\Models\bookmarks;
use App\Models\courses;
use App\Models\enrollments;
use App\Models\posts;
use App\Models\reads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function view() {
        $user = Auth::user();
        $courses = courses::all();

        $allPosts = posts::all();

        if($user) {
            $readPosts = reads::all();
            $bookmarkPosts = bookmarks::where('users_id', $user->id)->orderBy('id', 'desc')->take(2)->get();
            return view('home', compact('user', 'courses', 'allPosts', 'readPosts', 'bookmarkPosts'));
        }

        return view('home', compact('user', 'courses'));
    }
}
