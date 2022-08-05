<?php

namespace App\Http\Controllers;

use App\Models\Carousel;

class CarouselController extends Controller
{
    public function index()
    {
        return Carousel::select('id', 'title', 'landscaped_image', 'url', 'has_button')->get();
    }
}
