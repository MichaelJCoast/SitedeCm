<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutImage;

class AboutController extends Controller
{
    public function index()
    {
        return About::get();
    }

    public function image()
    {
        return AboutImage::select('image','mode')->get();
    }
}
