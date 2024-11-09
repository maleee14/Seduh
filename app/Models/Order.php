<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $tabel = 'orders';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'state',
        'street_address',
        'city',
        'zip_code',
        'phone',
        'email',
        'grand_total',
        'status',
    ];
}
