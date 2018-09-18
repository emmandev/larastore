<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function metas()
    {
        return $this->hasMany('App\Models\ProductTypeMeta');
    }
}
