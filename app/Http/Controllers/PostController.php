<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
