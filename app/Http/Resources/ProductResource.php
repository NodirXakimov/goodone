<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_name' => $this->name,
            'product_qty' => $this->id,
            'materials' => MaterialResource::collection($this->materials),
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ];
    }
}
