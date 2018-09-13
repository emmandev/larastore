<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Product')
                    ->as('products_to_product_types');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductTypeAttribute');
    }
}
