<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public function metas()
    {
        return $this->hasMany('App\Models\OrderProductMeta', 'order_product_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
