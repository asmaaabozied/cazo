<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkingDayHours extends JsonResource
{
    private $day;

    public function __construct($resource, $day) {
        // Ensure we call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        $this->day = $day; // $apple param passed
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return [
            'id'       => $this->id,
            'hour'     => date('H:i', strtotime($this->time)),
            'booked'   => $this->check($this->time, $this->day)
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function toObject($times, $day)
    {
        $data = [];
        foreach($times as $index => $time) {
            if($index != count($times)){
                $data [] = [
                    'id'       => $time->id,
                    'hour'     => date('H:i', strtotime($time->time)),
                    'booked'   => $time->check($time->time, $day)
                ];
            }
        }
        return $data;
    }

}
