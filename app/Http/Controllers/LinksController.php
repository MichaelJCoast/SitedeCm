<?php

namespace App\Http\Controllers;

use App\Models\Link;

class LinksController extends Controller
{
    public function index()
    {
        return Link::latest()->select('id', 'name', 'link_to', 'link_icon')->get();
    }
}
