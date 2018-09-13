<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
        return $this->belongsToMany('App\Models\ProductType')
                    ->as('products_to_product_types');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Models\ProductTypeAttribute')
                    ->as('product_metas')
                    ->withPivot('value');
    }
}
