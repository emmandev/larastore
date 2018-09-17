<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')
                    ->as('product_product_type');
    }

    public function attributes()
    {
        return $this->hasMany('App\Models\ProductTypeAttribute');
    }
}
