<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'name' => ['required', 'string', 'max:255'],
            'order' => ['required'],
            'total' => ['required', 'numeric'],
            'status' => ['required'],
        ]);

        $order = Order::create($credentials);

        return response([
            'message' => 'Order submitted successfully',
            'order' => $order,
        ]);
    }
}
