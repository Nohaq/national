<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TermResource extends JsonResource
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
            'term_name' => $this->term_name,
            // 'specilization' =>new SpecializationResource( $this->specialization()),
            // 'created_at' => $this->created_at->diffForHumans(),
            // 'updated_at' => $this->updated_at->diffForHumans(), 
        
        ];
    }
}
