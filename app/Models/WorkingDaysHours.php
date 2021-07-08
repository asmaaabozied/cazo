<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class WorkingDaysHours extends Model
{
    public $table = "working_days_hours";

    public $fillable = [
        'working_days_id',
        'time'
    ];

    /**
     * The attributes that should be casted to native types.
     * 
     * @var array
     */
    protected $casts = [
        'id'                   => 'integer',
        'working_days_id'      => 'integer',
        'time'                 => 'time'
    ];

    public function workingDays(){
        return $this->belonsTo('App\Models\WorkingDays');
    }

    public function check($time, $day){
        $date = \Carbon\Carbon::now();
        // dd($day);
        if($day == $date->format('d-m-Y') && $time < $date->format('H:i')){
            return true;
        }
        // dump(Booking::where('hour', $time)->where('day', $day)->where('status', '!=', 1)->exists());
        if(Booking::where('hour', $time)->where('day', $day)->where('status', 1)->exists()){
            return true;
        }

        return false;

    }
}
