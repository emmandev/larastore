<?php

namespace App\Http\Traits;

trait MoneyTrait
{
    /**
     * Price is centavo based so it is using integers, this will format it to float
     *
     * @param integer $value
     * @return float
     */
    public function formatToFloat($value)
    {
        return floatval($value / 100);
    }

    /**
     * Price is centavo based so it is using integers, this will format it back to integer
     *
     * @param float $value
     * @return integer
     */
    public function formatToInt($value)
    {
        return intval($value * 100);
    }
}
