<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 * @package App\Models
 * @version July 8, 2020, 12:58 pm UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property string $image
 */
class Brand extends Model
{
    use SoftDeletes;

    public $table = 'brands';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'image'
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
        'image'       => 'string'
    ];

    /**
     * Create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'name_en'     => 'required|string',
        'name_ar'     => 'required|string',
        'image'       => 'required|file|image'
    ];

    /**
     * update validation rules
     * 
     * @var array
     */
    public static $update_rules = [
        'name_en'      => 'required|string',
        'name_ar'      => 'required|string'
    ];
}
