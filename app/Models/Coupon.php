<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Coupon
 * @package App\Models
 * @version June 28, 2020, 10:01 am UTC
 *
 * @property string $name
 * @property integer $count_of_use
 * @property string $code
 * @property string $start_date
 * @property string $end_date
 */
class Coupon extends Model
{
    use SoftDeletes;

    public $table = 'coupons';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'count_of_use',
        'code',
        'start_date',
        'end_date',
        'discount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'              => 'integer',
        'name'            => 'string',
        'count_of_use'    => 'integer',
        'code'            => 'string',
        'start_date'      => 'string',
        'end_date'        => 'string'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'            => 'required|string',
        'count_of_use'    => 'required|numeric',
        'code'            => 'required|string|min:6|unique:coupons,code,NULL,id,deleted_at,NULL',
        'start_date'      => 'required|date',
        'end_date'        => 'required|date',
        'discount'        => 'required'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $update_rules = [
        'name'            => 'required|string',
        'count_of_use'    => 'required|numeric',
        'code'            => 'required|string|min:6|unique:coupons,code,',
        'start_date'      => 'required|date',
        'end_date'        => 'required|date',
        'discount'        => 'required'
    ];

    
}
