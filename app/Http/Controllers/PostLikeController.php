<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);  // This will ensure that any unauthenticated users will not be able to like posts
    }

    public function store(Post $post, Request $request)
    {
        if ($post->likedBy($request->user())) {
            return response(null, 409); // 409 is a conflict Http code.
        };

        // dd($post);
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        // Mail::to($user)->send(new PostLiked(auth()->user(), $post));
        Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));

        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        // dd($post);
        // also need to set up authentication on the delete ability for only that user
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
