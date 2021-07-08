<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Roles
 * @package App\Models
 * @version June 25, 2020, 7:08 am UTC
 *
 * @property string $name
 */
class Roles extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'name'    => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'    => 'required|string'
    ];

    public function permissions(){
        return $this->belongsToMany('App\Models\Permissions', 'roles_permissions', 'role_id', 'permission_id')->withTimestamps();
    }

    public function admins(){
        return $this->hasMany('App\Models\User', 'role_id');
    }
}
