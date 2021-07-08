<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version June 8, 2020, 10:23 am UTC
 *
 * @property string $name_en
 * @property string $name_ar
 * @property tinyInteger $active
 * @property integer $parent_id
 */
class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_en',
        'name_ar',
        'active',
        'parent_id',
        'image',
        'home'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'             => 'integer',
        'name_en'        => 'string',
        'name_ar'        => 'string',
        'parent_id'      => 'integer',
        'image'          => 'string'
    ];

    /**
     * create Validation rules
     *
     * @var array
     */
    public static $create_rules = [
        'name_en'        => 'required|string|unique:categories,name_en,NULL,id,deleted_at,NULL',
        'name_ar'        => 'required|string|unique:categories,name_ar,NULL,id,deleted_at,NULL',
        'image'          => 'required|image|file'
    ];

    /**
     * update Validation rules
     *
     * @var array
     */
    public static $update_rules = [
        'name_en'        => 'required|string',
        'name_ar'        => 'required|string',
        'image'          => 'file|image'
    ];

    public function parent(){
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }


}
