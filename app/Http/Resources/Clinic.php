<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Region;
use App\Http\Resources\Suburbs;
use App\Http\Resources\Category;

class Clinic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header      = request()->header('Accept-Language');
        $name        = 'name_' . $header;
        $description = 'description_' . $header;

        return [
            'id'             => $this->id,
            'name'           => $this->$name,
            'image'          => url($this->image),
            'region'         => $this->whenLoaded('region')->$name,
            'suburb'         => $this->whenLoaded('suburb')->$name,
            'address'        => $this->address,
            'description'    => $this->$description,
            'phone_number'   => $this->phone_number,
            'contant_email'  => $this->contact_email,
            'latitude'       => $this->latitude,
            'longitude'      => $this->longitude,
            'categories'     => Category::collection($this->categories())
        ];
    }
}
