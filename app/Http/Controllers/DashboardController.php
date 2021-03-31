<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // dd(Post::find(6)->created_at);
        $user = auth()->user();

        Mail::to($user)->send(new PostLiked());

        return view('dashboard');
    }
}
