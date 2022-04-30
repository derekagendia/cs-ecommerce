<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function details($slug)
    {
        return view('products.details',['details' => Product::findBySlug($slug)]);
    }
}
