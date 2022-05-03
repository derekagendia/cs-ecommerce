<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use App\Models\delivery_confirms;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\DeliveryProduct;
use Illuminate\Support\Facades\Mail;
use DB;
use Carbon\Carbon;


class OrderTable extends Component
{

    public function render()
    {
        return view('livewire.order-list',
            [
                'orders' => Order::getOwnOrderShop(auth()->user()->shop->id)
            ]
        )->extends('layouts.app')->section('content');

    }

    public function is_delivery(int $id)
    {
        $order = Order::find($id);

        $order->status = 'processing';
        $order->save();

        //send mail to client to confirm the reception of product

        $client = User::Where('email', $order->user->email)->firstOrFail();

        $token = Str::random(64);

        delivery_confirms::updateOrCreate(
            ['order_number' => $order->order_number],
            [
                'email' => $client->email,
                'token' => $token,
                'order_number' => $order->order_number,
                'total_amount_to_withdrawal' => $order->grand_total,
                'shop_name' => auth()->user()->shop->name,
                'phone_to_withdrawal' => $order->shop->owner->phone,
            ]
        );

        Mail::to($client)->send(new DeliveryProduct($client,$token));

    }

    public function deleteOrder(int $id)
    {
        Order::find($id)->delete();
    }

    public function paginationView()
    {
        return 'livewire.pagination';
    }
}
