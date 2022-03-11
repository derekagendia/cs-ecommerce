<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    CONST IS_PAID = true;
    CONST IS_NOT_PAID = false;

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public static function getOwnOrderShop($shop_id)
    {
        return Order::where('shop_id', $shop_id)->paginate(5);
    }
}
