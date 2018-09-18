<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function types()
    {
        return $this->belongsToMany('App\Models\ProductType', 'product_product_type');
    }

    public function metas()
    {
        return $this->belongsToMany('App\Models\ProductTypeMeta', 'product_metas')
                    ->withPivot('value');
    }
}
