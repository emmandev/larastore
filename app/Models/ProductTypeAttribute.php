<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTypeAttribute extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Product')
                    ->as('product_metas')
                    ->withPivot('value');
    }

    public function type()
    {
        return $this->belongsTo('App\ProductType');
    }
}