<?php

namespace App\Repositories;

use App\Models\Complains;
use App\Repositories\BaseRepository;
use Auth;

/**
 * Class ComplainsRepository
 * @package App\Repositories
 * @version June 21, 2020, 3:00 pm UTC
*/

class ComplainsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type_id',
        'message',
        'client_id'
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
        return Complains::class;
    }

    /**
     * Create a Complain from API
     */
    public function apiComplain($input){
        $client = Auth::user();

        $input['client_id'] = $client->id;

        $complain = $this->model;
        $complain->fill($input)->save();

        return $complain;
    }

    /**
     * Get Complains Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $complains = $this->model->count();

        return $complains;
    }
}
