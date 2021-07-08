<?php

namespace App\Repositories;

use App\Models\Specialization;
use App\Repositories\BaseRepository;
use App\Helpers\FileUpload;
use App\Models\SpecializationImages;
use App\Models\WorkingDays;
use App\Models\WorkingDaysHours;
use App\Http\Resources\Specialization as SpecializationResource;
use App\Http\Resources\AllSpecialization;
use App\Http\Resources\SpecializationDetails;
use Auth;

/**
 * Class SpecializationRepository
 * @package App\Repositories
 * @version June 21, 2020, 11:50 am UTC
*/

class SpecializationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        'name_ar',
        'category_id',
        'subcategory_id',
        'doc_title_en',
        'doc_title_ar',
        'doc_name_en',
        'doc_name_ar',
        'description_en',
        'description_ar',
        'image',
        'fee',
        'offer_fee',
        'clinic_id',
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
        return Specialization::class;
    }

    /**
     * create model record
     * 
     * @param array $input
     * 
     * @return Specialization
     */
    public function create($input){
        $images = [];

        if(request()->hasFile('images')){
            foreach(request()->file('images') as $file){
                $image = FileUpload::uploadFile('upload/Specialization', $file, '-specialization-');
                $specialization_image = new SpecializationImages;
                $specialization_image->image = $image;
                array_push($images, $specialization_image);
            }
        }

        $specialization = $this->model;
        $specialization->fill($input)->save();
        $specialization->images()->saveMany($images);
        $workingDays = [];
        foreach($input['days'] as $day => $valid){
            $workingDay                    = new WorkingDays;
            $workingDay->day               = $day;
            $workingDay->open              = $valid;
            $workingDay->specialization_id = $specialization->id;
            $workingDay->save();
            if($valid != 0){
                if($input['start_date'][$day] != null && $input['end_date'][$day] != null && $input['splitter'][$day] != null){
                    $times = [];
                    $i = strtotime($input['start_date'][$day]);
                    $j = strtotime($input['end_date'][$day]);
                    while($i <= $j){
                        $converted = date('H:i', $i);
                        $workingDayHours = new WorkingDaysHours;
                        $workingDayHours->time = $converted;
                        $workingDayHours->working_days_id = $workingDay->id;
                        $workingDayHours->save();
                        $i = strtotime('+' . $input['splitter'][$day] . ' minutes', $i);
                    }

                }
            }

        }
        
        return $specialization;
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
        $images = [];

        if(request()->hasfile('images')){
            foreach(request()->file('images') as $file){
                $image = FileUpload::uploadFile('upload/Specialization', $file, '-specialization-');
                $specialization_image = new SpecializationImages;
                $specialization_image->image = $image;
                array_push($images, $specialization_image);
            }
        }

        $specialization = $this->model->findorFail($id);
        $specialization->fill($input)->save();

        if(count($images)){
            foreach($specialization->images as $old_image){
                if(file_exists( public_path() . $old_image->image)){
                    unlink($old_image->image);
                }
            }
            $specialization->images()->delete();
            $specialization->images()->saveMany($images);
        }

        if($specialization->days != null){
            $days = $specialization->days;
            foreach($days as $day){
                if($day->times != null){
                    $day->times()->delete();
                }
            }

            $specialization->days()->delete();
        }

        $workingDays = [];
        foreach($input['days'] as $day => $valid){
            $workingDay                    = new WorkingDays;
            $workingDay->day               = $day;
            $workingDay->open              = $valid;
            $workingDay->specialization_id = $specialization->id;
            $workingDay->save();
            if($valid != 0){
                if($input['start_date'][$day] != null && $input['end_date'][$day] != null && $input['splitter'][$day] != null){
                    $times = [];
                    $i = strtotime($input['start_date'][$day]);
                    $j = strtotime($input['end_date'][$day]);
                    while($i <= $j){
                        $converted = date('H:i', $i);
                        $workingDayHours = new WorkingDaysHours;
                        $workingDayHours->time = $converted;
                        $workingDayHours->working_days_id = $workingDay->id;
                        $workingDayHours->save();
                        $i = strtotime('+' . $input['splitter'][$day] . ' minutes', $i);
                    }

                }
            }
        }

        return $specialization;
    }

    /**
     * delete model record for givin id
     * 
     * @param int $id
     * 
     * @return bool|mixed|null
     */
    public function delete($id){
        $specialization = $this->model->find($id);

        if($specialization->offer != null){
            $specialization->offer()->delete();
        }
        
        if(count($specialization->images)){
            foreach($specialization->images as $image){
                if(\file_exists(public_path() . $image->image)){
                    unlink($image->image);
                }
            }
            $specialization->images()->delete();
        }

        return $specialization->delete();
    }

    /**
     * Specialization offers list for api
     */
    public function list($request){

        $specializations     = $this->model->latest()->where('active', 1);

        if($request->all == null){
            $specializations = $specializations->whereHas('offer', function($query) {
                $query->where('home', 1);
            });
        }

        $specializations     = $specializations->with(['category', 'subcategory', 'clinic', 'images'])->get();
        if(isset($request->type)){
            
            $request_time = new \DateTime('@' . $request->server('REQUEST_TIME'));

            $offer_type = 0;
            if($request->type == "vip"){
                $offer_type = 3;
            }elseif($request->type == "24hours"){
                $offer_type = 2;
            }elseif($request->type == "under100"){
                $offer_type = 1;
            }
            
            $specializations     = $specializations->filter(function ($specialization, $key) use($offer_type, $request_time) {
                return $specialization->hasOffer($request_time, $offer_type);
            });
        }


        return SpecializationResource::collection($specializations);
    }

    /**
     * Specilaizations filter list for api
     */
    public function filter($request){
        $specializations   = $this->model->where('active', 1);

        if(isset($request->clinic_id)){
            $clinic_id = $request->clinic_id;
            $specializations = $specializations->where('clinic_id', $clinic_id);
        }

        if(isset($request->region_id)){
            $region_id  = $request->region_id;
            $specializations = $specializations->whereHas('clinic', function($query) use($region_id) {
                $query->where('region_id', $region_id);
            });
        }

        if(isset($request->category_id)){
            $category_id = $request->category_id;
            $specializations = $specializations->where('category_id', $category_id);
        }

        if(isset($request->subcategory_id)){
            $subcategory_id = $request->subcategory_id;
            $specializations = $specializations->where('subcategory_id', $subcategory_id);
        }

        if(isset($request->name)){
            $name = $request->name;
            $specializations = $specializations->where('name_en', 'LIKE', '%' . $name . '%')->orWhere('name_ar', 'LIKE', '%' . $name . '%');
        }

        if(isset($request->gender) && in_array($request->gender, ['Male', 'Female'])){
            $gender = $request->gender;
            $specializations = $specializations->where('doc_gender', $gender);
        }

        if(isset($request->minPrice) && isset($request->maxPrice)){
            $minPrice = $request->minPrice;
            $specializations = $specializations->where('fee', '>=', $minPrice);
        }

        if(isset($request->maxPrice)){
            $maxPrice = $request->maxPrice;
            $specializations = $specializations->where('fee', '<=', $maxPrice);
        }

        if(isset($request->accept_code) && $request->accept_code == 1){
            $accept_code  = $request->accept_code;
            $specializations = $specializations->whereHas('clinic', function($query) use($accept_code) {
                $query->where('accept_code', $accept_code);
            });
        }

        if(isset($request->sort_by) && in_array($request->sort_by, ['fee', 'created_at'])){
            $sort_by     = $request->sort_by;
            $sort_type   = isset($request->sort_type) && in_array($request->sort_type, ['asc', 'desc']) ? $request->sort_type : 'desc';
            $specializations = $specializations->orderBy($sort_by, $sort_type);
        }else{
            $specializations = $specializations->latest();
        }

        if(isset($request->open)){
            $open = $request->open;
            $openSpecializations = $this->model->all()->filter(function ($query, $key) use($open) {
                return $query->open($open);
            })->pluck('id')->all();
            $specializations = $specializations->whereIn('id', $openSpecializations);
        }

        $pageLimit = 10;
        if(isset($request->pageLimit)){
            $pageLimit = $request->pageLimit;
        }

        $specializations = $specializations->with(['images', 'clinic'])->paginate($pageLimit);

        if($request->sort_by == 'rate'){
            $specializations = $specializations->setCollection(collect($specializations->sortByDesc('rate')));
        }

        $data = AllSpecialization::collection($specializations);
        $specializations = $specializations->toArray();
        $specializations['data']       = $data;
        $specializations['min_price']  = count($data) ? min(array_column($specializations['data']->toArray($request), 'old_fee')) : 0;
        $specializations['max_price']  = count($data) ? max(array_column($specializations['data']->toArray($request), 'old_fee')) : 0;
        
        return $specializations;
    }

    /**
     * get specialization data for api
     */
    public function getData($id){
        $specialization = $this->model->whereId($id)->with('clinic', 'images', 'days', 'offer', 'reviews', 'category', 'subcategory')->first();
        // dd($specialization);
        if($specialization == null){
            return [];
        }
        $related_specializations = $this->model->where('category_id', $specialization->category_id)
                                               ->where('subcategory_id', $specialization->subcategory_id)
                                               ->where('id', '!=', $specialization->id)->where('active', 1)->with('images', 'offer', 'reviews')->take(10)->get();
                                    
        $specialization->related = $related_specializations;

        return new SpecializationDetails($specialization);
    }

    /**
     * Get Specializations Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $specializations = $this->model;

        if(Auth::user()->role_id == 3){
            $specializations = $specializations->where('clinic_id', Auth::user()->clinic ? Auth::user()->clinic->id : null);
        }

        $specializations = $specializations->count();

        return $specializations;
    }
}
