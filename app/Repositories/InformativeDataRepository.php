<?php

namespace App\Repositories;

use App\Models\InformativeData;
use App\Repositories\BaseRepository;
use App\Http\Resources\InformativeData as InformativeDataResource;
use App\Helpers\FileUpload;

/**
 * Class InformativeDataRepository
 * @package App\Repositories
 * @version June 17, 2020, 2:31 pm UTC
*/

class InformativeDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contact_email',
        'phone_number',
        'about_en',
        'about_ar',
        'privecy_en',
        'privecy_ar',
        'terms_conditions_en',
        'terms_conditions_ar',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'snapchat_link',
        'default_fee'
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
        return InformativeData::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return InformativeData
     */
    public function create($input){
        if(request()->hasFile('about_image')){
            $input['about_image'] = FileUpload::uploadFile('upload/Informative', request()->file('about_image'), '-about-');
        }

        $informative = $this->model;
        $informative->fill($input)->save();

        return $informative;
    }

    /**
     * Update model record for given id
     * 
     * @param array $input
     * @param int   $id
     * 
     * return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id){
        if(request()->hasFile('about_image')){
            $input['about_image'] = FileUpload::uploadFile('upload/Informative', request()->file('about_image'), '-about-');
        }

        $informative = $this->model->findorFail($id);
        $informative->fill($input)->save();

        return $informative;
    }

    /**
     * Get Informative content
     */
    public function informative($input){
        if($input == "social_links"){
            $data = $this->model->select("facebook_link", "instagram_link", "snapchat_link", 'twitter_link')->first();
        }else{
            $data = $this->model->select($input . '_en', $input . '_ar')->first();
        }
        
        return new InformativeDataResource($data);
    }
    
}
