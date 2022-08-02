<?php

namespace App\Http\Controllers;

use App\Models\Size;

class SizesController extends Controller
{
    public function index()
    {
        return Size::select('id', 'name')->get();
    }
}
