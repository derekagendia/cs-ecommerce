<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaidRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shipping_fullname = $request['shipping_fullname'];
        $order->shipping_state = $request['shipping_state'];
        $order->shipping_city = $request['shipping_city'];
        $order->shipping_address = $request['shipping_address'];
        $order->shipping_phone = $request['shipping_phone'];
        $order->shipping_zipcode = $request['shipping_zipcode'];

        if (!$request->has('billing_fullname')) {
            $order->billing_fullname = $request['shipping_fullname'];
            $order->billing_state = $request['shipping_state'];
            $order->billing_city = $request['shipping_city'];
            $order->billing_address = $request['shipping_address'];
            $order->billing_phone = $request['shipping_phone'];
            $order->billing_zipcode = $request['shipping_zipcode'];
        } else {
            $order->billing_fullname = $request['billing_fullname'];
            $order->billing_state = $request['billing_state'];
            $order->billing_city = $request['billing_city'];
            $order->billing_address = $request['billing_address'];
            $order->billing_phone = $request['billing_phone'];
            $order->billing_zipcode = $request['billing_zipcode'];
        }


        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();


        if (request('payment_method') == 'paypal') {
            $order->payment_method = 'paypal';
        }

        foreach (\Cart::session(auth()->id())->getContent() as $item) {

            $order->shop_id = $order->shop_id = $item->associatedModel['shop_id'];

        }
        $order->save();

        $cartItems = \Cart::session(auth()->id())->getContent();

        foreach ($cartItems as $item) {

            $order->items()->attach($item->id, ['price' => $item->price, 'quantity' => $item->quantity]);

        }

//$order->generateSubOrders();

// Send Mail to a client to inform it we have receive their order
        Mail::to($order->user->email)->send(new OrderPaidRequest($order));

        return redirect()->route('home')->withMessage('Order has been placed');

    }
}
