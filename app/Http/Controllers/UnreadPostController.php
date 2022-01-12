<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\posts;
use App\Models\reads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnreadPostController extends Controller
{
    public function view(Request $request) {
        $user = Auth::user();
        $courses = courses::all();

        if ($request->search) {
            $allPosts = posts::all()->where('title', 'LIKE', "%{$request->search}%");
        }
        else {
            $allPosts = posts::all();
        }

        $readPosts = reads::all();

        return view('unreadPost', compact('user', 'courses', 'allPosts', 'readPosts'));
    }
}
