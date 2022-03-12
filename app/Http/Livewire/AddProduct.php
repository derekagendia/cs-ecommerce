<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Livewire\Component;

class AddProduct extends Component
{
    public string $name = '';
    public int $price = 0;
    public string $description = '';
   // public int $quantity = 0;
//    public int $category_id = 1;

    protected $rules = [
        'name' => 'string|min:4|required',
        'price' => 'required|integer|min:0',
        'description' => 'required|string|min:0',
    ];

    public function render()
    {
        return view('livewire.add-product');
    }

    public function create()
    {
        $data = $this->validate();

//        $data['category_id'] = $this->category_id;
        $data['name'] = ucfirst($this->name);
        //$data['slug'] = Str::slug($this->name);

        auth()->user()->shop->products()->create($data);

        //Product::create($data);

        $this->emit('productAdded');

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Product successfully added.']);
    }
}
