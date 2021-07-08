<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Booking extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $header         = request()->header('Accept-Language');
        $name           = 'name_' . $header;
        $description    = 'description_' . $header;
        $specialization = $this->whenLoaded('specialization');
        
        $status = "";
        if($this->status == 1){
            $status = trans('messages.new');
        }
        if($this->status == 2){
            $status = trans('messages.ended');
        }
        if($this->status == 3){
            $status = trans('messages.canceled_by_user');
        }

        $images = [];
        $booking_images = $this->whenLoaded('images');
        foreach($booking_images as $image){
            array_push($images, url($image->image));
        }

        return [
            'id'           => $this->id,
            'day'          => $this->day,
            'time'         => date('H:i', strtotime($this->hour)),
            'status'       => $status,
            'status_check' => $this->status,
            'name'         => $specialization->$name,
            'description'  => $specialization->$description,
            'image'        => count($specialization->images) ? url($specialization->images[0]->image) : null,
            'reports'      => $images,
            'address'      => $specialization->clinic->address,
            'original_fee' => $this->fee,
            'offer_fee'    => $this->offer,
            'code'         => $this->code,
            'latitude'     => $specialization->clinic->latitude,
            'longitude'    => $specialization->clinic->longitude
        ];  
    }
}
