<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\MoneyTrait;

class Product extends Model
{
    use MoneyTrait;

    public function types()
    {
        return $this->belongsToMany('App\Models\ProductType');
    }

    public function metas()
    {
        return $this->belongsToMany('App\Models\ProductTypeMeta', 'product_metas')
                    ->withPivot('value');
    }

    /**
     * Formats the price attribute of the model after retrieval from the database
     */
    public function getPriceAttribute($value)
    {
        return $this->formatToFloat($value);
    }

    /**
     * Formats the price attribute of the model before saving to the database
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $this->formatToInt($price);
    }
}
