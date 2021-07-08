<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FAQ extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header = request()->header('Accept-Language');

        $question = 'question_' . $header;
        $answer   = 'answer_'   . $header;

        return [
            'question' => $this->$question,
            'answer'   => $this->$answer
        ];
    }
}
