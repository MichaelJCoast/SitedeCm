<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'name' => ['required', 'string', 'max:255'],
            'order' => ['required'],
            'total' => ['required', 'numeric'],
            'status_id' => ['required'],
        ]);

        $order = Order::create($credentials);

        Mail::to($credentials['email'])->send(new \App\Mail\sendOrderConfirmation($order));

        return response([
            'msg' => 'Order submitted successfully',
            'order' => $order,
        ]);
    }
}
