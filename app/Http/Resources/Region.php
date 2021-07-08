<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Region extends JsonResource
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

        $name = 'name_' . $header;
        return [
            'id'    => $this->id,
            'name'  => $this->$name
        ];
    }
}
