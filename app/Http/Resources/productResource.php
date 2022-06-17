<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
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
            'id' => $this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,
            'category_title'=>$this->category_title,
            'product_image'=>$this->product_image,
            'product_status'=>$this->product_status,
        ];
    }
}
