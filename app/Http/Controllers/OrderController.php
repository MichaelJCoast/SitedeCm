<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Provider\Node\RandomNodeProvider;
use Ramsey\Uuid\Uuid;

class OrderController extends Controller
{
    public function create_uuid()
    {
        $nodeProvider = new RandomNodeProvider();
        $clockSequence = 16383;
        return Uuid::uuid1($nodeProvider->getNode(), $clockSequence);
    }

    public function createVerificationUrl($email, $order_id)
    {
        $dataToken = ['email' => $email, 'id' => $order_id, 'token' => $this->create_uuid()];
        $crypted = Crypt::encrypt($dataToken);
        // Remove :8000 later
        $url = env('APP_URL') . ':8000' . '/verify-order/' . $crypted;
        return $url;
    }

    public function verifyToken($verifyToken)
    {
        $decrypt = Crypt::decrypt($verifyToken);
        $verify = Order::where($decrypt);
        if ($verify->exists()) {
            $verify->update(['status_id' => '2']);
        }
    }

    public function submitOrder(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'name' => ['required', 'string', 'max:255'],
            'order' => ['required'],
            'total' => ['required', 'numeric'],
            'status_id' => ['required'],
        ]);

        $credentials['token'] = $dataToken['token'];

        $order = Order::create($credentials);

        $order['verification_url'] = $this->createVerificationUrl($credentials['email'], $order->id);

        Mail::to($credentials['email'])->send(new \App\Mail\sendOrderConfirmation($order));

        return response([
            'msg' => 'Order submitted successfully',
            'order' => $order,
        ]);
    }
}
