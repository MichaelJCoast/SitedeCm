<?php

namespace App\Http\Controllers;
use App\Models\Mandato;

class MandateController extends Controller
{
    public function index() 
    {
        return Mandato::get();
    }
}
