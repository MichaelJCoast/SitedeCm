<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class CategoryController extends Controller
{
    public function index()
    {
        return Categoria::select('id', 'name')->get();
    }
}
