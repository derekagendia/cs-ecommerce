<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_confirms;


class ReceiveController extends Controller
{
    public function receive(Request $request)
    {
        // when user click to the link we mark the order as delivered to true
        $orderFind = delivery_confirms::where('token',$request->token)->update([
           'delivery' => 1
        ]);

        if(!$orderFind)
            abort(403,'Token Expired Please contact your shop to resend you the confirmation link');

        return view('confirm-delivery-product');
    }

    public function product()
    {
        return view('products.product-list');
    }
}
