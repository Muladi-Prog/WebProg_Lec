<?php

namespace App\Http\Controllers;

use App\Models\bookmarks;
use App\Models\courses;
use App\Models\posts;
use App\Models\reads;
use App\Models\replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function view($posts_id) {
        $user = Auth::user();
        $courses = courses::all();

        $currentPost = posts::where('id', $posts_id)->first();
        $currentReplies = replies::all()->where('posts_id', $posts_id);

        $readPost = reads::all();
        $bookmarkPost = bookmarks::all();

        if (!$readPost->contains(['users_id', 'posts_id'], [$user->id, $posts_id])) {
            $read = reads::create([
                'users_id' => $user->id,
                'posts_id' => $posts_id
            ]);
        }

        $bookmark = $bookmarkPost->contains(['users_id', 'posts_id'], [$user->id, $posts_id]);

        return view('reply', compact('user', 'courses', 'currentPost', 'currentReplies', 'bookmark'));
    }
}
