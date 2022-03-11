<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','slug'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'shop_id');
    }

    public static function findShopBySlug($slug)
    {
        return Shop::where('slug', $slug)->get();
    }


}
