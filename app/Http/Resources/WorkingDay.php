<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\WorkingDayHours;

class WorkingDay extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this['day']);
        $day = "";
        if($this['day'] == 1){
            $day = trans('messages.sunday');
        }elseif($this['day'] == 2){
            $day = trans('messages.monday');
        }elseif($this['day'] == 3){
            $day = trans('messages.tuesday');
        }elseif($this['day'] == 4){
            $day = trans('messages.wednsday');
        }elseif($this['day'] == 5){
            $day = trans('messages.thursday');
        }elseif($this['day'] == 6){
            $day = trans('messages.friday');
        }else{
            $day = trans('messages.saturday');
        }

        return [
            'id'        => $this['id'],
            'day'       => $day,
            'open'      => $this['open'],
            'date'      => $this['date'],
            'times'     => count($this['times']) ? WorkingDayHours::toObject($this['times'], $this['date']) : null
        ];
    }
}
