<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.order-table',
            [
                'orders' => Order::getOwnOrderShop(auth()->user()->shop->id)
            ]
        );

    }

    public function is_paid(int $id)
    {
        $order = Order::find($id);

        if($order->is_paid)
        {
            $order->is_paid = Order::IS_NOT_PAID;
            $order->save();
        }else
        {
            $order->is_paid = Order::IS_PAID;
            $order->save();
        }
    }

    public function deleteOrder(int $id)
    {
        Order::find($id)->delete();

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Order successfully deleted.']);
    }

    public function paginationView()
    {
        return 'livewire.pagination';
    }
}
