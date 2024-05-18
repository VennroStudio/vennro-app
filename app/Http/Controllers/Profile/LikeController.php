<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post){
        $like = new Like();
        $like->user_id = auth()->id();
        $post->likes()->save($like);

        $post->increment('likes');

        return back();
    }

    public function destroy(Post $post)
    {
        $user_id = auth()->id();
        $like = Like::where('user_id', $user_id)->where('post_id', $post->id)->first();

        if ($like) {
            $like->delete();
            $post->decrement('likes');
        }

        return back();
    }
}
