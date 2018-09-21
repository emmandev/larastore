<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    public function metas()
    {
        return $this->hasMany('App\Models\OrderProductMeta');
    }
}
