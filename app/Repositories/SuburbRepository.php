<?php

namespace App\Repositories;

use App\Models\Suburb;
use App\Repositories\BaseRepository;
use App\Http\Resources\Suburbs as SuburbsResource;

/**
 * Class SuburbRepository
 * @package App\Repositories
 * @version June 10, 2020, 7:07 am UTC
*/

class SuburbRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'active',
        'region_id'
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
        return Suburb::class;
    }

    /**
     * Get all active Suburbs in one regions
     */
    public function list($request){
        $suburbs = $this->model->latest()->where('active', 1)->where('region_id', $request->region_id)->get();

        return SuburbsResource::collection($suburbs);
    }
}
