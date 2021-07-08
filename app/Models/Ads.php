<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ads
 * @package App\Models
 * @version June 10, 2020, 12:55 pm UTC
 *
 * @property string $title_en
 * @property string $title_ar
 * @property string $image_en
 * @property string $image_ar
 * @property string $starting_date
 * @property string $ending_date
 * @property integer $active
 */
class Ads extends Model
{
    use SoftDeletes;

    public $table = 'ads';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title_en',
        'title_ar',
        'image_en',
        'image_ar',
        'starting_date',
        'ending_date',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'title_en'          => 'string',
        'title_ar'          => 'string',
        'image_en'          => 'string',
        'image_ar'          => 'string',
        'starting_date'     => 'string',
        'ending_date'       => 'string',
        'active'            => 'integer'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'title_en'          => 'required|string',
        'title_ar'          => 'required|string',
        'image_en'          => 'required|file|image',
        'image_ar'          => 'required|file|image',
        'starting_date'     => 'required|date',
        'ending_date'       => 'required|date'
    ];

    /**
     * Update Validation rules
     * 
     * @var array
     */
    public static $update_rules = [
        'title_en'          => 'string',
        'title_ar'          => 'string',
        'image_en'          => 'file|image',
        'image_ar'          => 'file|image',
        'starting_date'     => 'date',
        'ending_date'       => 'date'
    ];

    
}
