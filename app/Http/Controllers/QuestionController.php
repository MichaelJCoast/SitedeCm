<?php

namespace App\Http\Controllers;

use App\Models\Faq;

class QuestionController extends Controller
{
    public function index()
    {
        return Faq::get();
    }
}
