<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Brand as BrandResource;

/**
 * Class BrandRepository
 * @package App\Repositories
 * @version July 8, 2020, 12:58 pm UTC
*/

class BrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'image'
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
        return Brand::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Brand
     */
    public function create($input){
        if(request()->hasfile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Brand', request()->file('image'), '-brand-');
        }

        $brand = $this->model;
        $brand->fill($input)->save();

        return $brand;
    }

    /**
     * update model record for given id
     * 
     * @param array $input
     * @param int $id
     * 
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Brand', request()->file('image'), '-brand-');
        }

        $brand = $this->model->find($id);
        $brand->fill($input)->save();

        return $brand;
    }

    /**
     * list brands for api
     */
    public function list(){
        $brands = $this->model->latest()->get();

        return BrandResource::collection($brands);
    }
}
