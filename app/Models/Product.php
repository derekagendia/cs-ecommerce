<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','price','cover_img'];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public static function getProductShop($shop_id)
    {
        return Product::where('shop_id', $shop_id)->paginate(5);
    }
}
