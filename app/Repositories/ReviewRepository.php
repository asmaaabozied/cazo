<?php

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\BaseRepository;
use Auth;

/**
 * Class ReviewRepository
 * @package App\Repositories
 * @version July 19, 2020, 7:10 am UTC
*/

class ReviewRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'specialization_id',
        'user_id',
        'comment',
        'rate'
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
        return Review::class;
    }

    /**
     * hide/show review for users 
     */
    public function hide($id){
        $review = $this->model->find($id);
        $mesage = "";

        if($review->hidden == 0){
            $review->hidden = 1;
            $review->save();
            $message = "Review got hidden successfully";
        }else{
            $review->hidden = 0;
            $review->save();
            $message = "Review now available to users";
        }

        return $message;
    }

    /**
     * Create a Review from API
     */
    public function apiReview($input){
        $client = Auth::user();

        $input['user_id'] = $client->id;

        $review = $this->model;
        $review->fill($input)->save();

        return $review;
    }

    /**
     * Get Reviews Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $reviews = $this->model;

        if(Auth::user()->role_id == 3){
            $reviews = $reviews->whereIn('specialization_id', Auth::user()->clinic ? Auth::user()->clinic->specializationsIds() : []);
        }

        $reviews = $reviews->count();

        return $reviews;
    }
}
