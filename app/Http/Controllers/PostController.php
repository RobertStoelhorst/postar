<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20); // all posts returned with Post::get(), it is a laravel collection
        // paginate() will set the amount of posts to fetch and display per page
        // also Post::with(...) is eager loading so we are limiting our queries to the database.
        // dd($posts);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
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

    public function destroy(Post $post)
    {
        // dd($post);
        $this->authorize('delete', $post); // throw an exception

        $post->delete();

        return back();
    }
}
