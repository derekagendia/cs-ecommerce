<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;
use \App\Models\Product as Produit;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Category;

class Product extends Component
{
    use WithFileUploads;

    public $is_negociable = true;
    public $name;
    public $description;
    public $price;
    public $cover_img;
    public $image_2;
    public $image_3;
    public $price_negociable = 0;
    public $product_id;
    public $categories_id = null;

    protected function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'is_negociable' => 'required',
            'price' => 'required',
            'price_negociable' => 'nullable',
            'cover_img' => 'required|image|max:2024',
            'image_2' => 'required|image|max:2024',
            'image_3' => 'required|image|max:2024',
            'brand' => 'required',
            'state' => 'required',
        ];
    }

    public function saveProduct()
    {
        $data = $this->validate();
        $data['shop_id'] = auth()->user()->shop->id;
        $data['slug'] = Str::slug($this->name);
        $data['categories_id'] = $this->categories_id;
        $image = $this->cover_img->storeAs('shop-product-images/' . auth()->user()->shop->name, date('Ymd') . $this->cover_img->getClientOriginalName(), 'public');
        $image_2 = $this->image_2->storeAs('shop-product-images/' . auth()->user()->shop->name, date('Ymd') . $this->image_2->getClientOriginalName(), 'public');
        $image_3 = $this->image_3->storeAs('shop-product-images/' . auth()->user()->shop->name, date('Ymd') . $this->image_3->getClientOriginalName(), 'public');
        $data['cover_img'] = $image;
        $data['image_2'] = $image_2;
        $data['image_3'] = $image_3;

        try {

            Produit::create($data);
            $this->dispatchBrowserEvent('closeModalProduct');
            session()->flash('message', 'Product successfully created.');

        } catch (\Exception $error) {

            session()->flash('message', $error->getMessage());

        }
    }


    public function render()
    {
        return view('livewire.product', [
            'products' => Produit::getProductShop(auth()->user()->shop->id),
            'categories' => Category::all(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function productEdit(int $id)
    {
        $product = Produit::find($id);

        if ($product) {
            $this->product_id = $id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->is_negociation = $product->is_negociation;
            $this->price = $product->price;
            $this->price_negociable = $product->price_negociable;
            $this->cover_img = $product->cover_img;
            $this->image_2 = $product->image_2;
            $this->image_3 = $product->image_3;
            $this->categories_id = $product->categories_id;
        }
    }

    public function updateProduct()
    {
        $data = $this->validate();

        $image = $this->cover_img->storeAs('shop-product-images/' . auth()->user()->shop->name, date('Ymd') . $this->cover_img->getClientOriginalName(), 'public');
        $image_2 = $this->image_2->storeAs('shop-product-images/' . auth()->user()->shop->name, date('Ymd') . $this->image_2->getClientOriginalName(), 'public');
        $image_3 = $this->image_3->storeAs('shop-product-images/' . auth()->user()->shop->name, date('Ymd') . $this->image_3->getClientOriginalName(), 'public');
        $data['cover_img'] = '/storage/' . $image;
        $data['image_2'] = '/storage/' . $image_2;
        $data['image_3'] = '/storage/' . $image_3;

        try {

            $produit = Produit::find($this->product_id);

            $produit->name = $data['name'];
            $produit->slug = Str::slug($data['name']);
            $produit->cover_img = is_null($data['cover_img']) ? $produit->cover_img : $data['cover_img'] ;
            $produit->image_2 = is_null($data['image_2']) ? $produit->image_2 : $data['image_2'];
            $produit->image_3 = is_null($data['image_3']) ? $produit->image_3 : $data['image_3'];
            $produit->description = $data['description'];
            $produit->is_negociable = $data['is_negociable'];
            $produit->price = $data['price'];
            $produit->price_negociable = $data['price_negociable'];
            $produit->categories_id = is_null($this->categories_id) ? $produit->categories_id : $this->categories_id;

            $produit->save();

            $this->dispatchBrowserEvent('closeModalProduct');
            session()->flash('message', 'Product successfully updated.');
        } catch (\Exception $error) {
            session()->flash('message', $error->getMessage());
        }
    }

    public function deleteProduct(int $id)
    {
        Produit::find($id)->delete();

        session()->flash('message', 'Product successfully deleted.');

        return redirect()->to('/dashboard/products');
    }

}
