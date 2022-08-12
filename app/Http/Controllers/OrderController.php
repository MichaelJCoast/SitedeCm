<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
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

    public function createVerificationUrl($email, $order_id, $token, $expire)
    {
        //check for expiration date
        $expire = Carbon::parse($expire);
        $dataToken = ['token' => $token];
        $crypted = Crypt::encrypt($dataToken);
        $url = env('APP_URL') .':8000' . '/verify-order/' . $crypted . '?expired=' . $expire;
        return $url;
    }

    public function verifyToken($verifyToken)
    {
        $decrypt = Crypt::decrypt($verifyToken);
        $verify = Order::where($decrypt);
        if ($verify->exists()) {
            {
            $expire =$verify->value('expiration');
            $now = date('Y-m-d H:i:s');
            if( $expire > $now) {
                    $verify->update(['status_id' => 2]); 
                }              
            }
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

        $credentials['token'] = $this->create_uuid();
        $credentials['expiration'] = date('Y-m-d H:i:s', strtotime('+1 day'));

        $order = Order::create($credentials);

        $order['verification_url'] = $this->createVerificationUrl($credentials['email'], $order->id, $credentials['token'], $credentials['expiration']);

        Mail::to($credentials['email'])->send(new \App\Mail\sendOrderConfirmation($order));

        return response([
            'msg' => 'Order submitted successfully',
            'order' => $order,
        ]);
    }
}
