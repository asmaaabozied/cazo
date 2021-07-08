<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Favourite
 * @package App\Models
 * @version July 15, 2020, 12:27 pm UTC
 *
 * @property integer $user_id
 * @property integer $specialization_id
 */
class Favourite extends Model
{
    use SoftDeletes;

    public $table = 'favourites';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'specialization_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'specialization_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'user_id' => 'required|exists:users,id',
        'specialization_id' => 'required|exists:specializations,id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization')->where('active', 1)->with(['clinic', 'images', 'offer']);
    }
}
