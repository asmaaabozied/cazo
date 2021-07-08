<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Suburb
 * @package App\Models
 * @version June 10, 2020, 7:07 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property integer $active
 * @property integer $region_id
 */
class Suburb extends Model
{
    use SoftDeletes;

    public $table = 'suburbs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'active',
        'region_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'name_en'     => 'string',
        'name_ar'     => 'string',
        'active'      => 'integer',
        'region_id'   => 'integer'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'name_en'     => 'required|string|unique:suburbs,name_en,NULL,id,deleted_at,NULL',
        'name_ar'     => 'required|string|unique:suburbs,name_ar,NULL,id,deleted_at,NULL',
        'region_id'   => 'required'
    ];

    /**
     * Update Validation rules
     * 
     * @var array
     */
    public static $update_rules = [
        'name_en'    => 'required|string',
        'name_ar'    => 'required|string',
        'region_id'  => 'required'
    ];

    public function region(){
        return $this->belongsTo('App\Models\Region');
    }
    
}
