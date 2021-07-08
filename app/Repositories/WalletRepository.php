<?php

namespace App\Repositories;

use App\Models\Wallet;
use App\Models\Charges;
use App\Repositories\BaseRepository;
use App\Http\Resources\Wallet as WalletResource;
use Auth;

/**
 * Class WalletRepository
 * @package App\Repositories
 * @version July 26, 2020, 7:17 am UTC
*/

class WalletRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'total'
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
        return Wallet::class;
    }

    /**
     * charge money using api
     */
    public function charge($input){
        $user = Auth::user();
        $charge_wallet = null;

        if($user->wallet == null){
            $wallet = $this->model;
            $wallet->user_id = $user->id;
            $wallet->total   = 0;
            $wallet->save();
            $charge_wallet   = $wallet;
        }else{
            $charge_wallet = $user->wallet;
        }

        $input['wallet_id'] = $charge_wallet->id;
        // dd($input);

        $charge = new Charges($input);
        $charge->save();

        $charge_wallet->total += $input['charged'];
        $charge_wallet->save();

        return $charge;
    }

    /**
     * get user wallet
     */
    public function wallet(){
        $user = Auth::user();

        $charge_wallet = null;

        if($user->wallet == null){
            $wallet = $this->model;
            $wallet->user_id = $user->id;
            $wallet->total   = 0;
            $wallet->save();
            $charge_wallet   = $wallet;
        }else{
            $charge_wallet = $user->wallet;
        }

        return new WalletResource($charge_wallet);
    }
}
