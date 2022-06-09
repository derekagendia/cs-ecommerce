<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\PaymentApiController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function sendPayment(Request $request)
    {

        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shipping_fullname = auth()->user()->name;
        $order->shipping_state = auth()->user()->name;
        $order->shipping_city = request()->ip();
        $order->shipping_address = request()->ip();
        $order->shipping_phone = $request->phone;
        $order->shipping_zipcode = '0237';

        if (!$request->has('billing_fullname')) {
            $order->billing_fullname = auth()->user()->name;
            $order->billing_state = auth()->user()->name;
            $order->billing_city = request()->ip();
            $order->billing_address = request()->ip();
            $order->billing_phone = $request->phone;
            $order->billing_zipcode = '0237';
        } else {
            $order->billing_fullname = auth()->user()->name;
            $order->billing_state = auth()->user()->name;
            $order->billing_city = request()->ip();
            $order->billing_address = request()->ip();
            $order->billing_phone = $request->phone;
            $order->billing_zipcode = '0237';
        }


        $order->grand_total = $request->amount ? $request->amount : $request->price_negociable;
        $order->item_count = 1;

        $order->user_id = auth()->user()->id;

        $order->payment_method = ($request->operator == 'PAIEMENTMARCHAND_MTN_CM') ? 'MOMO' : 'OM';;

        $order->shop_id = $request->shop_id;

        $order->save();

        $data = [
            "idFromClient" => $order->order_number,
            "additionnalInfos" => [
                "recipientEmail" => auth()->user()->email,
                "recipientFirstName" => auth()->user()->name,
                "recipientLastName" => auth()->user()->name,
                "destinataire" => $request->phone,
            ],
            "amount" => $request->amount ? $request->amount : $request->price_negociable,
            "callback" => route('callback'),
            "recipientNumber" => $request->phone,
            "serviceCode" => $request->operator,
        ];

        return PaymentApiController::pay($data);
    }

    public function isGoodPrice(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($request->price_negociable < $product->price_negociable) {
            return response()->json([
                'status' => 302,
                'message' => 'Sorry your price is not within the corresponding range of our negotiate price !! please kindly propose another amount'
            ], 200);
        }

      return  $this->sendPayment($request);
    }

    public function checkStatus(Request $request)
    {
        return PaymentApiController::checkStatus($request->order_id);
    }
}
