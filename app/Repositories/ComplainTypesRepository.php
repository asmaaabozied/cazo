<?php

namespace App\Repositories;

use App\Models\ComplainTypes;
use App\Repositories\BaseRepository;
use App\Http\Resources\ComplainType as ComplainTypeResource;
/**
 * Class ComplainTypesRepository
 * @package App\Repositories
 * @version June 21, 2020, 8:56 am UTC
*/

class ComplainTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'active'
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
        return ComplainTypes::class;
    }

    /**
     * Get All Complain Types
     */
    public function getAll(){
        $complain_types = $this->model->where('active', 1)->get();

        return ComplainTypeResource::collection($complain_types);
    }
}
