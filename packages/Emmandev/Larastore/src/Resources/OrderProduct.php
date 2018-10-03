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
            'name' => ($this->name ?? $this->product->name),
            'slug' => ($this->slug ?? $this->product->slug),
            'sku' => ($this->sku ?? $this->product->sku),
            'price' => $this->whenPivotLoaded('order_product', function () {
                return $this->pivot->price;
            }),
            'quantity' => $this->whenPivotLoaded('order_product', function () {
                return $this->pivot->quantity;
            }),
            'total_price' => $this->whenPivotLoaded('order_product', function () {
                return $this->pivot->total_price;
            }),
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        $wrap = self::$wrap ?? 'data';

        return [$wrap => [
            'price' => $this->price,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'meta' => OrderProductMetaCollection::make($this->metas)
        ]];
    }
}
