<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            ->paginate(8);

        return view('products.product-list', ['products' => $result]);
    }
}
