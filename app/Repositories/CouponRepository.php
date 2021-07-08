<?php

namespace App\Repositories;

use App\Models\Coupon;
use App\Repositories\BaseRepository;

/**
 * Class CouponRepository
 * @package App\Repositories
 * @version June 28, 2020, 10:01 am UTC
*/

class CouponRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'count_of_use',
        'code',
        'start_date',
        'end_date'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Coupon::class;
    }

    public function valid($code){
        $coupon = Coupon::where('code', $code)->whereDate('start_date', '<=', \Carbon\Carbon::now())->whereDate('end_date', '>=', \Carbon\Carbon::now())->first();

        if($coupon){
            return true;
        }

        return false;
    }
}
