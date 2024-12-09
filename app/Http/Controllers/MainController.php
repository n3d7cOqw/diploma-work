<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();

        return view('main', compact('posts'));
    }
}
