<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;
use \App\Models\Product as Produit;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public string $search = '';

    public int $editId = 0;
    public int $addProduct = 0;
    public $listeners = [
        'productUpdated' => 'onProductUpdated',
        'productAdded' => 'onProductAdded'
    ];

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        return view('livewire.product',
        [
            'products' => Produit::getProductShop(auth()->user()->shop->id),
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function productEdit(int $id)
    {
        $this->editId = $id;
    }

    public function productAdd(int $id)
    {
        $this->addProduct  = $id;
    }

    public function onProductUpdated()
    {
        $this->reset('editId');
        $this->resetPage();
    }

    public function onProductAdded()
    {
        $this->reset('addProduct');
    }

    public function deleteProduct(int $id)
    {
        Produit::find($id)->delete();

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Product successfully deleted.']);
    }


    // pagination customise
    public function paginationView()
    {
        return 'livewire.pagination';
    }
}
