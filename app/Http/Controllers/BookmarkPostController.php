<?php

namespace App\Http\Controllers;

use App\Models\bookmarks;
use App\Models\courses;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkPostController extends Controller
{
    public function view() {
        $user = Auth::user();
        $courses = courses::all();

        $allPosts = posts::all();
        $bookmarkPosts = bookmarks::where('users_id', $user->id)->orderBy('id', 'desc')->get();

        return view('bookmarkpost', compact('user', 'courses', 'bookmarkPosts'));
    }
}
