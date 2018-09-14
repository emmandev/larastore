<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
        return $this->belongsToMany('App\Models\ProductType', 'products_to_product_types');
    }

    public function metas()
    {
        return $this->belongsToMany('App\Models\ProductTypeAttribute', 'product_metas')
                    ->withPivot('value');
    }
}
