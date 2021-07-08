<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Slider extends JsonResource
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
        $desc  = 'description_' . $header;
        $addit = 'additional_' . $header;

        return [
            'id'           => $this->id,
            'title'        => $this->$title,
            'description'  => $this->$desc,
            'additional'   => $this->$addit,
            'image'        => url($this->image),
            'discount'     => $this->discount_percentage,
            'forward_type' => $this->forward_type,
            'forward_id'   => $this->forward_id
        ];
    }
}
