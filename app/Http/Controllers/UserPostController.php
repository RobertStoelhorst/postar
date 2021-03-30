<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    // we want to be able to click on another user and show a list of there other posts/profile ect...
    public function index(User $user)
    {
        // dd($user);
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);

        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
