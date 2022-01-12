<?php

namespace App\Http\Controllers;

use App\Models\bookmarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookmarkProcessController extends Controller
{
    public function bookmark_process($posts_id){
        $user = Auth::user();
        $bookmarks = bookmarks::all();
        $bookmarkExists = false;

        foreach($bookmarks as $bm){
            if($bm->users_id == $user->id && $bm->posts_id == $posts_id){
                $bookmarkExists = true;
            }
        }
        if($bookmarkExists == false){
            bookmarks::create([
                'users_id' => $user->id,
                'posts_id' => $posts_id
            ]);
        }else if ($bookmarkExists == true){
            bookmarks::where('users_id',$user->id)->where('posts_id',$posts_id)->first()->delete();
        }

        return Redirect::back();
    }
}
