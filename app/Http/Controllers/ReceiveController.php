<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_confirms;


class ReceiveController extends Controller
{
    public function receive(Request $request)
    {
        // when user clic to the link we mark the order as delivered to true
        $orderfind = delivery_confirms::where('token',$request->token)->update([
           'delivery' => 1
        ]);

        if(!$orderfind)
            abort(403,'Token Expired Please contact your shop to resend you the confirmation link');

        return view('confirm-delivery-product');
    }
}
