<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
        'uuid'=>$this->uuid,
        'link' => $this->link,
        'image' => $this->image,
        // 'created_at' => $this->created_at->diffForHumans(),
        // 'updated_at' => $this->updated_at->diffForHumans(), 
    
    ];
    }
}
