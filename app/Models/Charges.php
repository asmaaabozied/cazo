<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{
    public $table = 'charges';

    public $fillable = [
        'wallet_id',
        'charged'
    ];

    /**
     * the attributes that should be casted to native types
     * 
     * @var array
     */
    protected $casts = [
        'id'         => 'integer',
        'wallet_id'  => 'integer',
        'charged'    => 'integer'
    ];

    public function wallet(){
        return $this->belongsTo('App\Models\Wallet');
    }
}
