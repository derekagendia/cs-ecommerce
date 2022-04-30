<?php

namespace App\Http\Livewire;

use App\Models\Product as Produit;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    // pagination customise
    public function paginationView()
    {
        return 'livewire.pagination';
    }

    public function render()
    {
        return view('livewire.product-list',[
            'products' => Produit::paginate(4),
        ]);
    }
}
