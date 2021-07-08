<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingDays extends Model
{
    public $table = "working_days";

    public $fillable = [
        'specialization_id',
        'day',
        'open'
    ];

    /**
     * The attribute that should be casted to native types.
     * 
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'specialization_id'  => 'integer',
        'day'                => 'integer',
        'open'               => 'integer'
    ];

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization');
    }

    public function times(){
        return $this->hasMany('App\Models\WorkingDaysHours')->orderBy('id');
    }
}
