<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'role_id',
        'name', 
        'email', 
        'active',
        'password',
        'birth_date',
        'phone_number',
        'gender',
        'google_id',
        'twitter_id',
        'facebook_id',
        'social_login',
        'firebase_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'               => 'integer',
        'name'             => 'string',
        'email'            => 'string',
        'password'         => 'string',
        'birth_date'       => 'date',
        'phone_number'     => 'string',
        'image'            => 'string',
        'gender'           => 'string',
        'google_id'        => 'string',
        'facebook_id'      => 'string',
        'twitter_id'       => 'string',
        'role_id'          => 'integer',
        'firebase_token'   => 'string',
        'social_login'     => 'string',
        'active'           => 'integer'
    ];

    /**
     * Register Validation rules
     *
     * @var array
     */
    public static $client_register_rules = [
        'name'             => 'required|string',
        'email'            => 'required|email|unique:users,email,NULL,id,role_id,2,deleted_at,NULL',
        'password'         => 'required|confirmed|min:8',
        'birth_date'       => 'required|date',
        'phone_number'     => 'required|string|unique:users,phone_number,NULL,id,role_id,2,deleted_at,NULL',
        'image'            => 'file|image',
        'gender'           => 'required|in:Male,Female',
    ];

    /**
     * Update Validation rules
     *
     * @var array
     */
    public static $client_update_rules = [
        'name'             => 'string',
        'email'            => 'email',
        'password'         => 'confirmed|min:8',
        'birth_date'       => 'date',
        'phone_number'     => 'string',
        'image'            => 'file|image',
        'gender'           => 'in:Male,Female',
    ];

    /**
     * Login Validation rules
     * 
     * @var array
     */
    public static $client_login_rules = [
        'email'            => 'required',
        'password'         => 'required'
    ];

    /**
     * Change Password rules
     * 
     * @var array
     */
    public static $change_password_rules =[
        'current_password'            => 'required',
        'new_password'                => 'required|different:current_password',
        'new_password_confirmation'   => 'required|same:new_password',
    ];

    /**
     * Create Admin Validation Rules
     * 
     * @var array
     */
    public static $admin_create_rules = [
        'name'             => 'required|string',
        'email'            => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
        'password'         => 'required|string|confirmed|min:8',
        'phone_number'     => 'required',
        'image'            => 'file|image',
        'role_id'          => 'required|exists:roles,id'
    ];

    /**
     * Update Admin Validation Rules
     * 
     * @var array
     */
    public static $admin_update_rules = [
        'name'             => 'required|string',
        'email'            => 'required|email',
        // 'password'        => 'confirmed|min:8',
        'phone_number'     => 'required',
        'image'            => 'file|image',
        'role_id'          => 'required|exists:roles,id'

    ];

    public function role(){
        return $this->belongsTo('App\Models\Roles', 'role_id');
    }

    public function clinic(){
        return $this->hasOne('App\Models\Clinic', 'admin_id');
    }

    public function favourites(){
        return $this->hasMany('App\Models\Favourite')->with('specialization');
    }

    public function review(){
        return $this->hasMany('App\Models\Review');
    }

    public function wallet(){
        return $this->hasOne('App\Models\Wallet')->with('charges');
    }

    public function hasPermission($requested_permission){
        $has = false;

        foreach($this->role->permissions as $permission){
            if($permission->name == $requested_permission){
                $has = true;
            }
        }

        return $has;
    }
}
