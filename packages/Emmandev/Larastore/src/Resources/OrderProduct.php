<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProduct extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->name,
            'sku' => $this->sku,
            'price' => $this->pivot->price,
            'quantity' => $this->pivot->quantity,
            'total_price' => $this->pivot->total_price
        ];
    }
}
