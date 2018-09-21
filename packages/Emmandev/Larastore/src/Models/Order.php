<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Models\Product')
                    ->using('App\Models\OrderProduct')
                    ->withPivot('price', 'quantity', 'total_price');
    }

    public function metas()
    {
        return $this->hasMany('App\Models\OrderMeta');
    }
}
