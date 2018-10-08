<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderMeta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'customer' => $this->customer,
            'billing' => $this->billing,
            'shipping' => $this->shipping,
            'cart' => $this->cart,
            'payment' => $this->payment
        ];
    }
}
