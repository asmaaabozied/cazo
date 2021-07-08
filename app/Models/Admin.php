<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Admin
 * @package App\Models
 * @version June 23, 2020, 12:07 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone_number
 * @property string $image
 */
class Admin extends Model
{
    use SoftDeletes;

    public $table = 'admins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'phone_number' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string|confirmed|min:8',
        'phone_number' => 'required',
        'image' => 'required|file|image'
    ];

    
}
