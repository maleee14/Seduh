<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTable extends Model
{
    protected $table = 'book_tables';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'date',
        'time',
        'phone',
        'message',
    ];
}
