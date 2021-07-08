<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Models\Notification;
use App\Models\Specialization;
use App\Models\User;
use App\Helpers\Notification as NotificationHelper;
use App\Repositories\BaseRepository;
use Illuminate\Validation\ValidationException;

/**
 * Class OfferRepository
 * @package App\Repositories
 * @version July 6, 2020, 7:49 am UTC
*/

class OfferRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'specialization_id',
        'offer_type',
        'offer_value',
        'starting_date',
        'ending_date'
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
        return Offer::class;
    }

    public function create($input){

        $specialization = Specialization::find($input['specialization_id']);
        // dd($specialization->price);
        if($input['offer_value'] >= $specialization->fee){
            throw ValidationException::withMessages(['offer_value' => 'Offer cannot be equal or more than the original price of the specialization']);
        }
        $offer = $this->model;
        $offer->fill($input)->save();

        $users = User::where('role_id', 2)->where('firebase_token', '!=', null)->get();

        $title              = "New Offer";
        $message            = "There is New Offer on " . $offer->specialization->name_en;
        $navigation_type    = "Specialization";
        $navigation_id      = $offer->specialization->id;

        foreach($users as $user){
            $firebase = NotificationHelper::firebase_notification($user->firebase_token, $title, $message, ['navigation_type' => $navigation_type, 'navigation_id' => $navigation_id]);
            
            $notification = new Notification;
            $notification->title             = $title;
            $notification->message           = $message;
            $notification->navigation_type   = $navigation_type;
            $notification->navigation_id     = $navigation_id;
            $notification->user_id           = $user->id;
            $notification->save();
        }

        return $offer;
    }
}
