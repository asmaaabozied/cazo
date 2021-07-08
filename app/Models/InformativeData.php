<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InformativeData
 * @package App\Models
 * @version June 17, 2020, 2:31 pm UTC
 *
 * @property string $contact_email
 * @property string $phone_number
 * @property string $about_en
 * @property string $about_ar
 * @property string $privecy_en
 * @property string $privecy_ar
 * @property string $terms_conditions_en
 * @property string $terms_conditions_ar
 * @property string $facebook_link
 * @property string $instagram_link
 * @property string $twitter_link
 * @property string $snapchat_link
 * @property integer $default_fee
 */
class InformativeData extends Model
{
    use SoftDeletes;

    public $table = 'informative_datas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'contact_email',
        'phone_number',
        'about_en',
        'about_ar',
        'privecy_en',
        'privecy_ar',
        'terms_conditions_en',
        'terms_conditions_ar',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'snapchat_link',
        'default_fee',
        'about_image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                     => 'integer',
        'contact_email'          => 'string',
        'phone_number'           => 'string',
        'about_en'               => 'string',
        'about_ar'               => 'string',
        'privecy_en'             => 'string',
        'privecy_ar'             => 'string',
        'terms_conditions_en'    => 'string',
        'terms_conditions_ar'    => 'string',
        'facebook_link'          => 'string',
        'instagram_link'         => 'string',
        'twitter_link'           => 'string',
        'snapchat_link'          => 'string',
        'default_fee'            => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contact_email'          => 'required|email',
        'phone_number'           => 'required',
        'about_en'               => 'required|string',
        'about_ar'               => 'required',
        'privecy_en'             => 'required',
        'privecy_ar'             => 'required',
        'terms_conditions_en'    => 'required',
        'terms_conditions_ar'    => 'required',
        'facebook_link'          => 'required',
        'instagram_link'         => 'required',
        'twitter_link'           => 'required',
        'snapchat_link'          => 'required',
        'default_fee'            => 'required',
        'about_image'            => 'file|image'
    ];

    
}
