<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productTypes()
    {
        return $this->belongsToMany('App\ProductType')
                    ->as('products_to_product_types');
    }

    public function productAtrributes()
    {
        return $this->belongsToMany('App\ProductTypeAttribute')
                    ->as('product_metas')
                    ->withPivot('value');
    }
}
