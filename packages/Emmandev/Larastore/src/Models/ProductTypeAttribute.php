<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTypeAttribute extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product')
                    ->as('product_metas')
                    ->withPivot('value');
    }

    public function productType()
    {
        return $this->belongsTo('App\ProductType');
    }
}
