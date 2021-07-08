<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header = request()->header('Accept-Language') == 'en' || request()->header('Accept-Language') == 'ar' ? request()->header('Accept-Language') : 'en';

        $name = 'name_' . $header;
        return [
            'id'    => $this->id,
            'name'  => $this->$name,
            'image' => url($this->image)
        ];
    }
}
