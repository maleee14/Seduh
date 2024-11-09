<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'image',
        'price',
        'description',
        'quantity',
        'total_amount',
    ];
}
