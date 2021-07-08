<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecializationImages extends Model
{
    use SoftDeletes;

    public $table = "specialization_images";

    protected $dates = ['deleted_at'];

    public $fillable = [
        'specialization_id',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     * 
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'specialization_id'  => 'integer',
        'image'              => 'string'
    ];

    public function specialization(){
        return $this->belongsTo('App\Models\Specialization');
    }
}
