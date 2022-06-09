<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const IS_PAID = true;
    const IS_NOT_PAID = false;

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
        return static::where('shop_id', $shop_id)->where('status', 'pending')->get();
    }

    public static function cancel($code)
    {
        $trans = static::whereOrder_number($code)->first();
        $trans->status = "decline";
        $trans->is_paid = 0;
        $trans->save();
    }

    public static function complete($code)
    {
        $trans = static::whereOrder_number($code)->first();
        $trans->status = "completed";
        $trans->is_paid = 1;
        $trans->save();
    }
}
