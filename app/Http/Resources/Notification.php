<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Notification extends JsonResource
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
            'id'               => $this->id,
            'title'            => $this->title,
            'message'          => $this->message,
            'navigation_type'  => $this->navigation_type,
            'navigation_id'    => $this->navigation_id,
            'day'              => $this->created_at->format('d-m-Y'),
            'time'             => $this->created_at->format('H:i')             
        ];
    }
}
