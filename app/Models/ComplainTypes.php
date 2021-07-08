<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComplainTypes
 * @package App\Models
 * @version June 21, 2020, 8:56 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property tinyInteger $active
 */
class ComplainTypes extends Model
{
    use SoftDeletes;

    public $table = 'complain_types';
    

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
        'name_ar'    => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en'    => 'required|string',
        'name_ar'    => 'required|string'
    ];

    
}
