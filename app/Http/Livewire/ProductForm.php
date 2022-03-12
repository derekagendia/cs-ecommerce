<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Product;

class ProductForm extends Component
{
    public Product $product;

    public $idProduct;

    protected $rules = [
        'product.name' => 'string|min:4|required',
        'product.price' => 'required|integer|min:0',
       // 'product.quantity' => 'required|integer|min:1',
        'product.description' => 'required|string|min:0',
    ];

    public function render()
    {
        return view('livewire.product-form');
    }

    public function update()
    {
        $this->validate();
        $this->product->name = ucfirst($this->product->name);
        $this->product->shop_id = auth()->user()->shop->id;
        //$this->product->slug = Str::slug($this->product->name);
        //$this->product->category_id = is_null($this->idProduct) ? is_null($this->product->category_id)? 1 : $this->product->category_id : $this->idProduct;
        $this->product->save();
        $this->emit('productUpdated');

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Product successfully added.']);
    }

}
