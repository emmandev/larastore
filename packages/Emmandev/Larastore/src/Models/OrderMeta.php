<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMeta extends Model
{
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function orderMetaKeys()
    {
        return [
            'customer' => [
                'name',
                'email',
                'phone',
                'company',
                'ip_address',
                'user_agent',
            ],

            'billing' => [
                'billing_name',
                'billing_address_1',
                'billing_address_2',
                'billing_city',
                'billing_state',
                'billing_post_code',
                'billing_country',
            ],

            'shipping' => [
                'shipping_name',
                'shipping_address_1',
                'shipping_address_2',
                'shipping_city',
                'shipping_state',
                'shipping_post_code',
                'shipping_country',
                'shipping_price',
                'shipping_tax',
                'shipping_discount',
                'shipping_method'
            ],

            'cart' => [
                'cart_discount',
                'cart_discount_tax',
                'cart_quantity',
                'cart_total',
                'notes',
                'coupon_code',
                'coupon_discount',
            ],

            'payment' => [
                'total_tax',
                'total_price',
                'payment_method',
                'payment_date',
                'currency'
            ],

        ];
    }

    public function getCustomerAttribute($value)
    {
        return json_decode($value);
    }

    public function setCustomerAttribute($value)
    {
        $this->attributes['customer'] = json_encode($value);
    }

    public function getBillingAttribute($value)
    {
        return json_decode($value);
    }

    public function setBillingAttribute($value)
    {
        $this->attributes['billing'] = json_encode($value);
    }

    public function getShippingAttribute($value)
    {
        return json_decode($value);
    }

    public function setShippingAttribute($value)
    {
        $this->attributes['shipping'] = json_encode($value);
    }

    public function getCartAttribute($value)
    {
        return json_decode($value);
    }

    public function setCartAttribute($value)
    {
        $this->attributes['cart'] = json_encode($value);
    }

    public function getPaymentAttribute($value)
    {
        return json_decode($value);
    }

    public function setPaymentAttribute($value)
    {
        $this->attributes['payment'] = json_encode($value);
    }
}
