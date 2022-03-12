<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{
    public string $searchProduct = '';

    protected $queryString = [
        'searchProduct' => ['except' => '']
    ];

    public function render()
    {
        return view('livewire.search-product');
    }

    public function updateProductSearch()
    {
        $this->emit('searchProductUpdated',$this->searchProduct);
    }
}
