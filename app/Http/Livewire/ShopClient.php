<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class ShopClient extends Component
{
    public function render()
    {
        return view('livewire.shop-client',
            [
                'clients' => Order::getOwnOrderShop(auth()->user()->shop->id)
            ]
        )->extends('layouts.app')->section('content');
    }
}
