<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductProductType extends JsonResource
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
            'name' => $this->name
        ];
    }

    public function with($request)
    {
        $wrap = self::$wrap ?? 'data';

        return [$wrap => [
            'description' => $this->description
        ]];
    }
}
