<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Slider as SliderResource;

/**
 * Class SliderRepository
 * @package App\Repositories
 * @version July 29, 2020, 8:15 am UTC
*/

class SliderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'additional_en',
        'additional_ar',
        'forward_type',
        'forward_id',
        'discount_percentage'
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
        return Slider::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Slider
     */
    public function create($input){
        if(request()->file('image')){
            $input['image'] = FileUpload::uploadFile('upload/Slider', request()->file('image'), '-slider-');
        }

        $slider = new Slider();
        $slider->fill($input)->save();

        return $slider;
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
            $input['image'] = FileUpload::uploadFile('upload/Slider', request()->file('image'), '-slider-');
        }

        $slider = Slider::findorFail($id);
        $slider->fill($input)->save();

        return $slider;
    }

    public function list(){
        $slider  = Slider::latest()->get();

        return SliderResource::collection($slider);
    }
}
