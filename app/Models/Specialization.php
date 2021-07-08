<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Specialization
 * @package App\Models
 * @version June 21, 2020, 11:50 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property tinyInteger $active
 */
class Specialization extends Model
{
    use SoftDeletes;

    public $table = 'specializations';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'category_id',
        'subcategory_id',
//        'doc_title_en',
//        'doc_title_ar',
//        'doc_name_en',
//        'doc_name_ar',
        'doc_gender',
        'description_en',
        'description_ar',
        // 'image',
        'fee',
        // 'offer_fee',
        'clinic_id',
        'active',
        'allow_upload_files'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'name_en'           => 'string',
        'name_ar'           => 'string',
        'category_id'       => 'integer',
        'subcategory_id'    => 'integer',
        'doc_name_en'       => 'string',
        'doc_name_ar'       => 'string',
        'doc_title_en'      => 'string',
        'doc_title_ar'      => 'string',
        'doc_gender'        => 'string',
        'description_en'    => 'string',
        'description_ar'    => 'string',
        // 'image'             => 'string',
        'fee'               => 'float',
        'offer_fee'         => 'integer',
        'clinic_id'         => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en'           => 'required|string',
        'name_ar'           => 'required|string',
        'description_en'    => 'required|string',
        'description_ar'    => 'required|string',
//        'doc_title_en'      => 'required|string',
//        'doc_title_ar'      => 'required|string',
//        'doc_name_en'       => 'required|string',
//        'doc_name_ar'       => 'required|string',
        'doc_gender'        => 'required|string|in:Male,Female',
        'category_id'       => 'required|integer|exists:categories,id',
        'subcategory_id'    => 'required|integer|exists:categories,id',
        'images'            => 'required',
        'fee'               => 'required',
        'clinic_id'         => 'required|integer|exists:clinics,id',
        'active'            => 'required'
    ];

    protected $appends = ['rate'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Category', 'subcategory_id');
    }

    public function clinic(){
        return $this->belongsTo('App\Models\Clinic', 'clinic_id');
    }

    public function images(){
        return $this->hasMany('App\Models\SpecializationImages');
    }

    public function offer(){
        return $this->hasOne('App\Models\Offer');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review')->where('hidden', 0)->with('user');
    }

    public function getRateAttribute(){
        return $this->reviews->avg('rate');
    }

    public function favourite(){
        return $this->hasMany('App\Models\Favourite');
    }

    public function days(){
        return $this->hasMany('App\Models\WorkingDays')->with('times');
    }

    public function hasOffer($time = null, $type = null){
        $has = false;

        if($this->offer != null){
            // dump($time >= $this->offer->starting_date);
            if($time != null){
                if($time >= $this->offer->starting_date && $time <= $this->offer->ending_date){
                    if($type != null ){
                        if($type == $this->offer->offer_type){
                            $has = true;
                        }
                    }else{
                        $has = true;
                    }
                }
            }else{
                $has = true;
            }

        }

        return $has;
    }

    public function favourited($user_id){
        $fav = $this->favourite->where('user_id', $user_id);
        if(count($fav)){
            return true;
        }else{
            return false;
        }
        // return
    }

    public function getMonthDays(){
        $current = time();
        $month = date('m');
        $year  = date('Y');
        $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dates_month = [];

        for ($i = 1; $i <= $num; $i++) {
            $day = [];
            $mktime = mktime(0, 0, 0, $month, $i, $year);
            $date = date("d-m-Y", $mktime);
            // $dates_month[$i] = $date;
            if($date >= date("d-m-Y", $current)){
                $day['date'] = $date;
                $day['name'] = date("l", $mktime);
                $dates_month[] = $day;
            }
        }

        if(count($dates_month) < 30){
            $wanted_days = 30 - count($dates_month);
            $plus_month = date('m', strtotime("+1 month", $current));
            // dd($plus_month);
            for ($i = 1; $i <= $wanted_days; $i++) {
                $day = [];
                $mktime = mktime(0, 0, 0, $plus_month, $i, $year);
                $date = date("d-m-Y", $mktime);
                $day['date'] = $date;
                $day['name'] = date("l", $mktime);
                $dates_month[] = $day;
            }
        }

        $week_days = [
            'Sunday'    => 1,
            'Monday'    => 2,
            'Tuesday'   => 3,
            'Wednesday' => 4,
            'Thursday'  => 5,
            'Friday'    => 6,
            'Saturday'  => 7
        ];

        foreach($dates_month as $index => $date){
            foreach($this->days as $day){
                if($day->day == $week_days[$date['name']]){
                    $dates_month[$index]['times'] = $day->times;
                    $dates_month[$index]['day']   = $day->day;
                    $dates_month[$index]['open']  = $day->open;
                    $dates_month[$index]['id']    = $day->id;
                }
            }
        }

        return $dates_month;
    }

    public function open($type){
        $open = false;
        if($type == 1 || $type == 3){
            $today = $this->getMonthDays()[0];
            // dump($today);
            if(isset($today['times'])){
                foreach($today['times'] as $time){
                    if(!$time->check($time->time, $today['day'])){
                        $open = true;
                        break;
                    }
                }
            }

        }
        if($type == 2 || $type == 3){
            $tomorrow = $this->getMonthDays()[1];
            if(isset($tomorrow['times'])){
                foreach($tomorrow['times'] as $time){
                    if(!$time->check($time->time, $tomorrow['day'])){
                        $open = true;
                        break;
                    }
                }
            }
        }
        return $open;
    }
}
