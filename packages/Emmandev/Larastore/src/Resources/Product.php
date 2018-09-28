<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductMetaCollection;
use App\Http\Resources\ProductProductTypeCollection;

class Product extends JsonResource
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
            'description' => $this->description,
            'sku' => $this->sku,
            'slug' => $this->slug,
            'price' => $this->price,
            'stock' => $this->stock,
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
            'metas' => ProductMetaCollection::make($this->metas),
            'types' => ProductProductTypeCollection::make($this->types),
        ];
    }
}
