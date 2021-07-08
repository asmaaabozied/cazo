<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FAQ
 * @package App\Models
 * @version June 18, 2020, 9:40 am UTC
 *
 * @property string $question_en
 * @property string $question_ar
 * @property string $answer_en
 * @property string $answer_ar
 */
class FAQ extends Model
{
    use SoftDeletes;

    public $table = 'f_a_q_s';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'question_en',
        'question_ar',
        'answer_en',
        'answer_ar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'            => 'integer',
        'question_en'   => 'string',
        'question_ar'   => 'string',
        'answer_en'     => 'string',
        'answer_ar'     => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question_en'   => 'required|string',
        'question_ar'   => 'required|string',
        'answer_en'     => 'required|string',
        'answer_ar'     => 'required|string'
    ];

    
}
