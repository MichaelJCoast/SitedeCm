<?php

namespace App\Http\Controllers;
use App\Models\Link;

class LinksController extends Controller
{
    public function index() 
    {
        return Link::latest()->get();
    }
}
