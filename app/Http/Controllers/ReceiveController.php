<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery_confirms;


class ReceiveController extends Controller
{
    public function receive(Request $request)
    {
        // when user clic to the link we mark the order as delivered to true
        delivery_confirms::where('token',$request->token)->update([
           'delivery' => 1
        ]);

        return view('confirm-delivery-product');
    }
}
