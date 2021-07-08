<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package App\Models
 * @version July 29, 2020, 8:15 am UTC
 *
 * @property string $title_en
 * @property string $title_ar
 * @property string $description_en
 * @property string $description_ar
 * @property string $additional_en
 * @property string $additional_ar
 * @property string $forward_type
 * @property string $forward_id
 * @property integer $discount_percentage
 */
class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'additional_en',
        'additional_ar',
        'forward_type',
        'forward_id',
        'discount_percentage',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                  => 'integer',
        'title_en'            => 'string',
        'title_ar'            => 'string',
        'description_en'      => 'string',
        'description_ar'      => 'string',
        'additional_en'       => 'string',
        'additional_ar'       => 'string',
        'forward_type'        => 'string',
        'forward_id'          => 'string',
        'discount_percentage' => 'integer',
        'image'               => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title_en'               => 'required|string',
        'title_ar'               => 'required|string',
        'description_en'         => 'required|string',
        'description_ar'         => 'required|string',
        'additional_en'          => 'required|string',
        'additional_ar'          => 'required|string',
        'forward_type'           => 'required|in:Category,Offer,Specialization',
        'forward_id'             => 'required',
        'discount_percentage'    => 'required',
        'image'                  => 'required'
    ];

    
}
