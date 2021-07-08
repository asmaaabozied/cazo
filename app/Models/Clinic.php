<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clinic
 * @package App\Models
 * @version June 29, 2020, 9:29 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property string $description_en
 * @property string $description_ar
 * @property integer $category_id
 * @property integer $subcategory_id
 * @property integer $region_id
 * @property integer $suburbs_id
 * @property string $address
 * @property string $image
 * @property string $contact_email
 * @property string $phone_number
 */
class Clinic extends Model
{
    use SoftDeletes;

    public $table = 'clinics';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'latitude',
        'longitude',
        'region_id',
        'suburbs_id',
        'address',
        'image',
        'contact_email',
        'phone_number',
        'admin_id',
        'accept_code'
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
        'description_en'    => 'string',
        'description_ar'    => 'string',
        // 'category_id'       => 'integer',
        // 'subcategory_id'    => 'integer',
        'region_id'         => 'integer',
        'suburbs_id'        => 'integer',
        'address'           => 'string',
        'image'             => 'string',
        'contact_email'     => 'string',
        'phone_number'      => 'string',
        'admin_id'          => 'integer'
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
        // 'category_id'       => 'required|exists:categories,id',
        // 'subcategory_id'    => 'required|exists:categories,id',
        'region_id'         => 'required|exists:regions,id',
        'suburbs_id'        => 'required|exists:suburbs,id',
        'address'           => 'required',
        'image'             => 'required|file|image',
        'contact_email'     => 'required|email',
        'phone_number'      => 'required|string',
        'admin_id'          => 'required|string|exists:users,id'
    ];

    // public function subcategory(){
    //     return $this->belongsTo('App\Models\Category', 'subcategory_id');
    // }

    public function region(){
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function suburb(){
        return $this->belongsTo('App\Models\Suburb', 'suburbs_id');
    }

    public function admin(){
        return $this->belongsTo('App\Models\User', 'admin_id');
    }

    public function specializations(){
        return $this->hasMany('App\Models\Specialization')->with('category');
    }

    public function categories(){
        $specializations = $this->specializations->unique('category_id');
        $categories = [];
        foreach($specializations as $specialization){
            $categories[] = $specialization->category;
        }
        // dd($categories);
        return $categories;
    }

    public function specializationsIds(){
        $ids = [];

        foreach($this->specializations as $specialization){
            $ids[] = $specialization->id;
        }

        return $ids;
    }
}
