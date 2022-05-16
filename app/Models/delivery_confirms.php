<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_confirms extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'delivery',
        'token',
        'order_number',
        'shop_name',
        'phone_to_withdrawal',
        'total_amount_to_withdrawal'
    ];
}
