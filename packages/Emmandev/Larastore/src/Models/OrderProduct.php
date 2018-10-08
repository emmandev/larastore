<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Http\Traits\MoneyTrait;

class OrderProduct extends Pivot
{
    use MoneyTrait;

    public function metas()
    {
        return $this->hasMany('App\Models\OrderProductMeta', 'order_product_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
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
        $this->attributes['price'] = $this->formatToInt($value);
    }

    /**
     * Formats the price attribute of the model after retrieval from the database
     */
    public function getTotalPriceAttribute($value)
    {
        return $this->formatToFloat($value);
    }

    /**
     * Formats the price attribute of the model before saving to the database
     */
    public function setTotalPriceAttribute($value)
    {
        $this->attributes['total_price'] = $this->formatToInt($value);
    }
}
