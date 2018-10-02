<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';

    protected $fillable = [
        'product_id',
        'quantity',
        'next_quantity',
        'previous_quantity'
    ];
}
