<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatePostController extends Controller
{
    public function view() {
        $user = Auth::user();
        $courses = courses::all();

        return view('createPost', compact('user', 'courses'));
    }
    public function create(Request $request,$user_id){
        $data = $request->validate([
            'users_id',
            'title' => 'required|min:5',
            'description'=>'required|min:10',
            'courses_id'
        ]);
        $data['courses_id'] = $request->courses_id;
        $data['users_id'] = $user_id;
        
        posts::create($data);
        
        return redirect()->back()->with('success',"Post Created");
    }
}
