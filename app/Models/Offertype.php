<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offertype extends Model
{
    public $table = 'offertypes';


    public $fillable = [
        'type'
    ];
}
