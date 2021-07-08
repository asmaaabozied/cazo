<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reviews extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dump($this->whenLoaded('user'));
        return [
            'id'          => $this->id,
            'rate'        => $this->rate,
            'comment'     => $this->comment,
            'user_name'   => $this->whenLoaded('user')->name,
            'user_image'  => $this->whenLoaded('user')->image ? url($this->whenLoaded('user')->image) : null,
            'date'        => date('d-m-Y', strtotime($this->created_at))
        ];
    }
}
