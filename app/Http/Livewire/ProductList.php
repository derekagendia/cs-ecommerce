<?php

namespace App\Http\Livewire;

use App\Models\Product as Produit;
use Livewire\Component;

class ProductList extends Component
{
    protected $listeners = [
        'refreshProductList' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.product-list',[
            'products' => Produit::getProductShop(auth()->user()->shop->id),
        ]);
    }
}
