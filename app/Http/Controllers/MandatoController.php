<?php

namespace App\Http\Controllers;

use App\Models\Mandato;

class MandatoController extends Controller
{
    public function index()
    {
        return Mandato::orderBy('year', 'desc')->get();
    }
}
