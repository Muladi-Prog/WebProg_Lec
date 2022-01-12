<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\enrollments;
use App\Models\likes;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function view($courses_id, Request $request) {
        $user = Auth::user();

        $courses = courses::all();
        $selected_course = courses::where('id', $courses_id)->first();
        $posts = posts::all()->where('courses_id', $courses_id);

        if($request->search != null){
            $search = $request->search;
            $posts = posts::where('courses_id', $courses_id)->where('title', 'like', "%{$search}%")->get();
        }else{
            $posts = posts::where('courses_id', $courses_id)->get();
        }

        return view('course', compact('user', 'courses', 'selected_course', 'posts'));
    }
}
