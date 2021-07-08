<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ads extends JsonResource
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

        $title = 'title_' . $header;
        $image = 'image_' . $header;

        return [
            'id'    => $this->id,
            'title' => $this->$title,
            'image' => url($this->$image)
        ];
    }
}
