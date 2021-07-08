<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingImages extends Model
{
    use SoftDeletes;

    public $table = "booking_images";

    protected $dates = ['deleted_at'];

    public $fillable = [
        'booking_id',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     * 
     * @var array
     */
    protected $casts = [
        'id'                 => 'integer',
        'booking_id'         => 'integer',
        'image'              => 'string'
    ];

    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
}
