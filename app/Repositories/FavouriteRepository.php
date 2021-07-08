<?php

namespace App\Repositories;

use App\Models\Favourite;
use App\Repositories\BaseRepository;
use Auth;
use App\Http\Resources\AllSpecialization;

/**
 * Class FavouriteRepository
 * @package App\Repositories
 * @version July 15, 2020, 12:27 pm UTC
*/

class FavouriteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'specialization_id'
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
        return Favourite::class;
    }

    public function favourite($input){

        $user_id = Auth::user()->id;

        $favourite = $this->model->where('user_id', $user_id)->where('specialization_id', $input['specialization_id']);

        if($favourite->exists()){
            $favourite->first()->forceDelete();
            return trans('messages.unfavourite');
        }
        
        $input['user_id'] = $user_id;
        $favourite = $this->model;
        $favourite->fill($input)->save();

        return trans('messages.favourite');
    }

    public function list(){
        $user = Auth::user();
        // dd($user->favourites);
        $specializations = [];
        foreach($user->favourites as $favourite){
            if($favourite->specialization){
                $specializations[] = $favourite->specialization;
            }
            
        }
        // dd($specializations);
        return AllSpecialization::collection(collect($specializations));
    }
}
