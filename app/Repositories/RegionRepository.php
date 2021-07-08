<?php

namespace App\Repositories;

use App\Models\Region;
use App\Repositories\BaseRepository;
use Flash;
use App\Http\Resources\Region as RegoinResource;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version June 9, 2020, 8:27 am UTC
*/

class RegionRepository extends BaseRepository
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
        return Region::class;
    }

    /**
     * @param int $id
     * 
     * @throws \Exception
     * 
     * @return bool|mixed|null
     */
    public function delete($id){
        $query = $this->model->newQuery();
        $region = $query->findOrFail($id);

        if(count($region->suburbs)){
            Flash::error('This Region contaions suburbs, please delete them first');
            return false;
        }        

        return $region->delete();
    }

    /**
     * @return mixed
     */
    public function list(){
        $regions = $this->model->latest()->where('active', 1)->get();

        return RegoinResource::collection($regions);
    }
}
