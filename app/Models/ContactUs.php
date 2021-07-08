<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactUs
 * @package App\Models
 * @version June 21, 2020, 7:26 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $message
 */
class ContactUs extends Model
{
    use SoftDeletes;

    public $table = 'contactuses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'phone_number',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'            => 'integer',
        'name'          => 'string',
        'email'         => 'string',
        'phone_number'  => 'string',
        'message'       => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'          => 'required',
        'email'         => 'required',
        'phone_number'  => 'required',
        'message'       => 'required'
    ];

    
}
