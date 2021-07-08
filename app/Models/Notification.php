<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @version August 6, 2020, 7:09 am UTC
 *
 * @property string $title
 * @property string $message
 * @property string $navigation_type
 * @property string $navigation_id
 * @property integer $user_id
 */
class Notification extends Model
{
    use SoftDeletes;

    public $table = 'notifications';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'message',
        'navigation_type',
        'navigation_id',
        'user_id',
        'read'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'message' => 'string',
        'navigation_type' => 'string',
        'navigation_id' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string',
        'message' => 'required|string',
        'navigation_type' => 'required'
    ];

    
}
