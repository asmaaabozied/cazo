<?php

namespace App\Repositories;

use App\Models\Ads;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Http\Resources\Ads as AdsResource;

/**
 * Class AdsRepository
 * @package App\Repositories
 * @version June 10, 2020, 12:55 pm UTC
*/

class AdsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title_en',
        'title_ar',
        'image_en',
        'image_ar',
        'starting_date',
        'ending_date',
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
        return Ads::class;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Ad
     */
    public function create($input)
    {
        if (request()->hasFile('image_en')) {
            $input['image_en'] = FileUpload::uploadFile('upload/Ads', request()->file('image_en'), '-ads-');
        }
        
        if (request()->hasFile('image_ar')) {
            $input['image_ar'] = FileUpload::uploadFile('upload/Ads', request()->file('image_ar'), '-ads-');
        } 

        $ad = new Ads();
        $ad->fill($input)->save();

        return $ad;
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     *
     */
    public function update($input, $id)
    {
        if (request()->hasFile('image_en')) {
            $input['image_en'] = FileUpload::uploadFile('upload/Ads', request()->hasFile('image_en'), '-ads-');
        }
        
        if (request()->hasFile('image_ar')) {
            $input['image_ar'] = FileUpload::uploadFile('upload/Ads', request()->hasFile('image_ar'), '-ads-');
        } 

        $ad = Ads::findOrFail($id);

        $ad->fill($input)->save();

        return $ad;
    }

    /**
     * List all ads for the api
     * 
     */
    public function list(){
        $today = today()->format('Y-m-d');

        $ads = $this->model->where('active', 1)->where('starting_date', '<=', $today)->where('ending_date', '>=', $today)->get();

        return AdsResource::collection($ads);
    }
}
