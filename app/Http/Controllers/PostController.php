<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::latest()->select('id', 'title', 'slug', 'category_id', 'portrait_image', 'created_at')->get();
    }

    public function getLatestPosts()
    {
        return Post::latest()->select('id', 'title', 'slug', 'category_id', 'portrait_image', 'created_at')->limit(6)->get();
    }

    protected function showFullPostBySlug($slug)
    {
        return Post::where('slug', $slug)->select('id', 'title', 'body', 'slug', 'category_id', 'landscaped_image', 'created_at')->first();
    }
}
