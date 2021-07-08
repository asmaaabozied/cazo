<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wallet
 * @package App\Models
 * @version July 26, 2020, 7:17 am UTC
 *
 * @property integer $user_id
 * @property integer $total
 */
class Wallet extends Model
{
    use SoftDeletes;

    public $table = 'wallets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'charged'    => 'required|numeric'
    ];

    public function charges(){
        return $this->hasMany('App\Models\Charges');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
