<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResourceGeneral extends JsonResource
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
            'id'=>$this->id,
            'course_name'=>$this->course_name,
            'course_num'=>$this->course_num,
            'credit_hour_course'=>$this->credit_hour_course,
            'previous_name_course'=>$this->previous_name_course

        ];
    }
}
