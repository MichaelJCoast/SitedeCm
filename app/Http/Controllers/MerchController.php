<?php

namespace App\Http\Controllers;

use App\Models\Merch;

class MerchController extends Controller
{
    public function getMerch()
    {
        return Merch::latest()->get();
    }

    protected function getProduct($id)
    {
        return Merch::where('id', $id)->first();
    }
}
