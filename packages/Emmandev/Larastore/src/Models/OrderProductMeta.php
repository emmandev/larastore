<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProductMeta extends Model
{
    public function orderProduct()
    {
        return $this->belongsTo('App\Model\OrderProduct');
    }
}
