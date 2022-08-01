<?php

namespace App\Http\Controllers;

use App\Models\Merch;
use App\Models\MerchSizes;

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

    public function getMerchSizeIds()
    {
        $merchSizes = MerchSizes::get();
        return $merchSizes;
    }
}
