<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
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
            'id'=>$this->id,
            'name_en'=>$this->name("en"),
            'name'=>$this->name("ar"),
            'img'=>asset("uploads/$this->img"),
            'exams'=>ExamResource::collection($this->whenLoaded('exams'))
        ];
    }
}
