<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category;
use App\Http\Resources\Clinic;

class Specialization extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header           = request()->header('Accept-Language');
        $name             = 'name_' . $header;
        $description      = 'description_' . $header;
        $doc_title        = 'doc_title_' . $header;
        $doc_name         = 'doc_name_' . $header;

        $images = [];
        $specialization_images = $this->whenLoaded('images');
        foreach($specialization_images as $image){
            array_push($images, url($image->image));
        }

        $offer = 0;
        if($this->hasOffer(new \DateTime('@' . request()->server('REQUEST_TIME')))){
            $offer = $this->whenLoaded('offer')->offer_value;
        }

        return [
            'id'                => $this->id,
            'name'              => $this->$name,
            'old_fee'           => $this->fee,
            'current_fee'       => $this->fee - round(($this->fee * $offer) / 100,2),
            'percentage'        => $offer,
            'image'             => count($images) ? $images[0] : "",
            'images'            => $images,
            'rate'              => $this->rate,
            'is_favourite'      => auth('api')->user() ? $this->favourited(auth('api')->user()->id) : false,
            'latitude'          => $this->clinic->latitude,
            'longitude'         => $this->clinic->longitude,
            'clinic_name'       => $this->clinic->$name,
            'clinic_image'      => url($this->clinic->image)
        ]; 
    }
}
