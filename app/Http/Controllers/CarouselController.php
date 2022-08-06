<?php

namespace App\Http\Controllers;

use App\Models\Carousel;

class CarouselController extends Controller
{
    public function index()
    {
        return Carousel::select('id', 'title', 'image', 'router_link', 'has_button')->get();
    }
}
