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
        ];

    protected $casts = [
      'created_at' => 'datetime:d/m/Y H:i',
      'updated_at' => 'datetime:d/m/Y H:i'
    ];

    public function setPriceAttribute($value)
    {
        if(!empty($value)){
            $patterns = ['/[R$\s.]*/', '/,/'];
            $replaces = ['', '.'];
            $this->attributes['price'] = (float) preg_replace($patterns, $replaces, $value);
        }

    }

    public function getPriceAttribute()
    {
        return 'R$ '.number_format($this->attributes['price'], 2, ',', '.');
    }
}
