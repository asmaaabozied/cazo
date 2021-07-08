<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Reviews;
use App\Http\Resources\WorkingDay;
use App\Http\Resources\Specialization as RelatedSpecialization;

class SpecializationDetails extends JsonResource
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
        $description = 'description_' . $header;
        $doc_name = 'doc_name_' . $header;
        $doc_title = 'doc_title_' . $header;

        $images = [];
        $specialization_images = $this->whenLoaded('images');
        foreach($specialization_images as $image){
            array_push($images, url($image->image));
        }

        $offer = 0;
        if($this->hasOffer(new \DateTime('@' . request()->server('REQUEST_TIME')))){
            $offer = $this->whenLoaded('offer')->offer_value;
        }

        $clinic = $this->whenLoaded('clinic');

        return [
            'id'                 => $this->id,
            'name'               => $this->$name,
            'description'        => $this->$description,
            'doc_name'           => $this->$doc_name,
            'doc_title'          => $this->$doc_title,
            'doc_gender'         => $this->doc_gender,
            'original_fee'       => $this->fee,
            'offer_fee'          => $this->fee - round(($this->fee * $offer) / 100,2),
            'percentage'         => $offer,
            'rate'               => $this->rate ? round($this->rate, 1) : 0,
            'clinic_name'        => $clinic->$name,
            'clinic_logo'        => url($clinic->image),
            'category_name'      => $this->whenLoaded('category') ? $this->whenLoaded('category')->$name : null,
            'subcategory_name'   => $this->whenLoaded('subcategory') ? $this->whenLoaded('subcategory')->$name : null,
            'is_favourite'       => auth('api')->user() ? $this->favourited(auth('api')->user()->id) : false,
            'images'             => $images,
            'reviews'            => count($this->reviews) ? Reviews::collection($this->whenLoaded('reviews')) : null,
            'working_hours'      => count($this->days)    ? WorkingDay::collection($this->getMonthDays()) : null,
            'latitude'           => $clinic->latitude,
            'longitude'          => $clinic->longitude,
            'related'            => RelatedSpecialization::collection($this->related),
            'allow_upload_files' => $this->allow_upload_files
        ];
    }
}
