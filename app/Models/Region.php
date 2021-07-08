<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 * @package App\Models
 * @version June 9, 2020, 8:27 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property integer $active
 */
class Region extends Model
{
    use SoftDeletes;

    public $table = 'regions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'name_en'    => 'string',
        'name_ar'    => 'string',
        'active'     => 'integer'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'name_en'    => 'required|string|unique:regions,name_en,NULL,id,deleted_at,NULL',
        'name_ar'    => 'required|string|unique:regions,name_ar,NULL,id,deleted_at,NULL'
    ];

    /**
     * Update Validation rules
     * 
     * @var array
     */
    public static $update_rules = [
        'name_en'    => 'required|string',
        'name_ar'    => 'required|string' 
    ];

    public function suburbs(){
        return $this->hasMany('App\Models\Suburb');
    }
}
