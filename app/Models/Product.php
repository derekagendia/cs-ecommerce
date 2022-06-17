<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'cover_img',
        'price_negociable',
        'shop_id',
        'is_negociable',
        'slug',
        'categories_id',
        'state',
        'brand',
        'image_2',
        'image_3'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public static function getProductShop($shop_id)
    {
        return Product::where('shop_id', $shop_id)->get();
    }

    public static function findBySlug($slug)
    {
        return static::where('slug',$slug)->firstOrFail();
    }
}
