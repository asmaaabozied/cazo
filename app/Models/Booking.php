<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Booking
 * @package App\Models
 * @version July 22, 2020, 3:14 pm UTC
 *
 * @property integer $user_id
 * @property integer $specialization_id
 * @property integer $fee
 * @property integer $offer
 * @property integer $day
 * @property time $hour
 * @property string $coupon
 * @property integer $status
 * @property string $code
 */
class Booking extends Model
{
    use SoftDeletes;

    public $table = 'bookings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'specialization_id',
        'fee',
        'offer',
        'day',
        'hour',
        'coupon',
        'status',
        'code',
        'payment_type',
        'coupon_offer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'specialization_id' => 'integer',
        'fee' => 'integer',
        'offer' => 'integer',
        'day' => 'string',
        'coupon' => 'string',
        'status' => 'integer',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'specialization_id' => 'required|exists:specializations,id',
        'hour_id'           => 'required|exists:working_days_hours,id',
        'coupon'            => 'exists:coupons,code'
    ];

    /**
     * update Validation rules
     *
     * @var array
     */
    public static $update_rules = [
        'status'    => 'required|in:1,2,3'
    ];

    public function images(){
        return $this->hasMany('App\Models\BookingImages');
    }

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
