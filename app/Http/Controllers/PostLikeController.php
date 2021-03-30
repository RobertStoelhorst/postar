<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    //
    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) {
            return response(null, 409); // 409 is a conflict Http code.
        };

        // dd($post);
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);


        return back();
    }
}
