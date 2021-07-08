<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\images;

class AllSpecialization extends JsonResource
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
        $description = "description_" . $header;
        
        $images = [];
        $specialization_images  = $this->whenLoaded('images');
        foreach($specialization_images as $image){
            array_push($images, url($image->image));
        }

        $offer = 0;
        if($this->hasOffer(new \DateTime('@' . request()->server('REQUEST_TIME')))){
            $offer = $this->whenLoaded('offer')->offer_value;
        }

        return [
            'id'            => $this->id,
            'name'          => $this->$name,
            'description'   => $this->$description,
            'old_fee'       => $this->fee,
            'current_fee'   => $this->fee - round(($this->fee * $offer) / 100, 2),
            'percentage'    => $offer,
            'rate'          => $this->rate ? round($this->rate, 1) : 0,
            'clinic_name'   => $this->whenLoaded('clinic')->$name,
            'clinic_logo'   => url($this->whenLoaded('clinic')->image),
            'is_favourite'  => auth('api')->user() ? $this->favourited(auth('api')->user()->id) : false,
            'images'        => $images,
            'latitude'      => $this->whenLoaded('clinic')->latitude,
            'longitude'     => $this->whenLoaded('clinic')->longitude,
        ];
    }
}
