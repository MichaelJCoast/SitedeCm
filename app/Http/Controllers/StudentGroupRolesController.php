<?php

namespace App\Http\Controllers;
use App\Models\Cargo;

class StudentGroupRolesController extends Controller
{
    public function index() 
    {
        return Cargo::get();
    }
}
