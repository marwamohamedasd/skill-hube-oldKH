<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
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
            'name_en'=>$this->name("en"),
            'name_ar'=>$this->name("ar"),
            'desc_en'=>$this->desc("en"),
            'desc_ar'=>$this->desc("ar"),
            'Questions Number'=>$this->questions_no,
            'Active'=>$this->active,
            'questions'=>QuestionResource::collection($this->whenLoaded('questions')),

        ];
    }
}
