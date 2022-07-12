<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        return Post::latest()->get();
    }

    protected function showFullPostBySlug($slug)
    {
        return Post::where('slug', $slug)->first();
    }
}
