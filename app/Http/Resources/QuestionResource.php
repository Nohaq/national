<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'conent' => $this->content,
            'referenc' => $this->referenc,
            'specilaization'=>new SpecializationResource($this->whenLoaded('specialization')),
            'collage'=>new CollageResource($this->whenLoaded('collage')),
            'term_name'=>new TermResource($this->whenLoaded('term')),
            'Answers'=>new AnswerCollection($this->whenLoaded('answers')),
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(), 
        
        ];
    }
}
