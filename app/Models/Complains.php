<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Complains
 * @package App\Models
 * @version June 21, 2020, 3:00 pm UTC
 *
 * @property integer $type_id
 * @property string $message
 */
class Complains extends Model
{
    use SoftDeletes;

    public $table = 'complains';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type_id',
        'client_id',
        'booking_id',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'type_id'   => 'integer',
        'message'   => 'string',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_id'   => 'required',
        'message'   => 'required',
        'client_id' => 'required'
    ];

    /**
     * Api validation rules
     * 
     * @var array
     */
    public static $api_rules = [
        'type_id'   => 'required|exists:complain_types,id',
        'message'   => 'required|string',
    ];

    public function type(){
        return $this->belongsTo('App\Models\ComplainTypes', 'type_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\User', 'client_id');
    }

    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
}
