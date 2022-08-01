<?php

namespace App\Http\Controllers;

class SizesController extends Controller
{
    public function index()
    {
        return Size::get();
    }
}
