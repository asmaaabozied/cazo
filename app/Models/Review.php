<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Review
 * @package App\Models
 * @version July 19, 2020, 7:10 am UTC
 *
 * @property integer $specialization_id
 * @property integer $user_id
 * @property string $comment
 * @property integer $rate
 */
class Review extends Model
{
    use SoftDeletes;

    public $table = 'reviews';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'specialization_id',
        'user_id',
        'comment',
        'rate',
        'hidden'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'specialization_id' => 'integer',
        'user_id'           => 'integer',
        'comment'           => 'string',
        'rate'              => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'specialization_id' => 'required|exists:specializations,id',
        'comment'           => 'required|string',
        'rate'              => 'required|numeric|max:5'
    ];

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
