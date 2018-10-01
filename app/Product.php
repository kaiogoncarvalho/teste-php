<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'name',
            'description',
            'price',
            'quantity',
            'active'
        ];

    protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at'
    ];

    public function setPriceAttribute($value)
    {
        if(!empty($value)){
            $patterns = ['/[R$\s.]*/', '/,/'];
            $replaces = ['', '.'];
            $this->attributes['price'] = (float) preg_replace($patterns, $replaces, $value);
        }

    }
}
