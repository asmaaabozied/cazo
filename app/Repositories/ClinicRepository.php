<?php

namespace App\Repositories;

use App\Models\Clinic;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Clinic as ClinicResource;
/**
 * Class ClinicRepository
 * @package App\Repositories
 * @version June 29, 2020, 9:29 am UTC
*/

class ClinicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'category_id',
        'subcategory_id',
        'region_id',
        'suburbs_id',
        'address',
        'image',
        'contact_email',
        'phone_number'
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
        return Clinic::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Clinic
     */
    public function create($input){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Clinic', request()->file('image'), '-clinic-');
        }

        $clinic = new Clinic();
        $clinic->fill($input)->save();

        return $clinic;
    }

    /**
     * update model record for givin id
     * 
     * @param array $input
     * @param int $id
     * 
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id){
        if(request()->hasFile('image')){
            $input['image'] = FileUpload::uploadFile('upload/Clinic', request()->file('image'), '-clinic-');
        }

        $clinic = Clinic::findorFail($id);
        $clinic->fill($input)->save();

        return $clinic;
    }

    /**
     * clinics listing api
     */
    public function list(){
        $clinics = $this->model->latest()->with('region', 'suburb')->get();

        return ClinicResource::collection($clinics);
    }

    public function find($id, $columns = ['*']){
        $clinic = $this->model->where('id', $id)->with('region', 'suburb')->first();

        if($clinic != null){
            return new ClinicResource($clinic);
        }

        return false;
    }

    /**
     * Get Clinics Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $clinics = $this->model->count();

        return $clinics;
    }
}
