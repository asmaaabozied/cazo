<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Offer
 * @package App\Models
 * @version July 6, 2020, 7:49 am UTC
 *
 * @property integer $specialization_id
 * @property integer $offer_type
 * @property number $offer_value
 * @property string $starting_date
 * @property string $ending_date
 */
class Offer extends Model
{
    use SoftDeletes;

    public $table = 'offers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'specialization_id',
        'offer_id',
        'offer_value',
        'starting_date',
        'ending_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'specialization_id' => 'integer',
        'offer_id' => 'integer',
        'offer_value' => 'double',
        'starting_date' => 'date',
        'ending_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'specialization_id' => 'required|exists:specializations,id',
        'offer_id' => 'required',
        'offer_value' => 'required|numeric',
        'starting_date' => 'required|date',
        'ending_date' => 'required|date'
    ];

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization');
    }


    public function offertype(){
        return $this->belongsTo(Offertype::class,'offer_id');
    }
}
