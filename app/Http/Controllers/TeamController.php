<?php

namespace App\Http\Controllers;
use App\Models\Equipa;

class TeamController extends Controller
{
    public function index() 
    {
        return Equipa::get();
    }
}
