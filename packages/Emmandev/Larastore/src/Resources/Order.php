<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderMetaCollection;
use App\Http\Resources\OrderProductCollection;
use App\Http\Resources\User as UserResource;

class Order extends JsonResource
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
            'user_id' => $this->user->id,
            'products_count' => $this->products()->pluck('quantity')->reduce(function ($carry, $item) {
                return $carry + $item;
            }),
            'products_price_total' => collect($this->products)->pluck('pivot.total_price')->reduce(function ($carry, $item) {
                return $carry + $item;
            }),
            'status' => $this->status,
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
            'metas' => OrderMetaCollection::make($this->metas),
            'products' => OrderProductCollection::make($this->products),
            'user' => new UserResource($this->user)
        ]];
    }
}
