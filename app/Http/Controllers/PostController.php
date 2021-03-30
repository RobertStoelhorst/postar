<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(20); // all posts returned with Post::get(), it is a laravel collection
        // paginate() will set the amount of posts to fetch and display per page
        // dd($posts);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        // dd('ok getting that ready for you');
        // return view('');

        // Create the post
        $request->user()->posts()->create($request->only('body'));

        return back();
    }
}
