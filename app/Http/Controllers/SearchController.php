<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProduct(Request $request)
    {
        $result = Product::where('name', 'like', '%' . $request->name . '%')->paginate(8);

        return view('products.product-list', ['products' => $result, 'product_name' => $request->name]);
    }

    public function filterSearch(Request $request)
    {

        $result = Product::whereBetween('price', [$request->price1, $request->price2])
            ->where('is_negociable', $request->is_negociable)
            ->where('date_creation',$request->date)
            ->paginate(8);

        return view('products.product-list', ['products' => $result]);
    }

    public function searchByCategory($id)
    {
        $result = Product::where('categories_id', $id)
            ->paginate(8);

        return view('products.product-list', ['products' => $result]);
    }

    public function searchOwnerProduct($slug)
    {
        $shop = Shop::where('slug',$slug)->get()[0];
        $result = Product::where('shop_id', $shop->id)
            ->paginate(8);

        return view('products.product-list', ['products' => $result, 'shop' => $shop]);
    }
}
