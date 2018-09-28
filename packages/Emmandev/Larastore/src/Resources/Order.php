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
        return [
            'metas' => OrderMetaCollection::make($this->metas),
            'products' => OrderProductCollection::make($this->products),
            'user' => new UserResource($this->user)
        ];
    }
}
