<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Helpers\Notification as NotificationHelper;
use App\Http\Resources\Notification as NotificationResource;
use Auth;

/**
 * Class NotificationRepository
 * @package App\Repositories
 * @version August 6, 2020, 7:09 am UTC
*/

class NotificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'message',
        'navigation_type',
        'navigation_id',
        'user_id'
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
        return Notification::class;
    }

    /**
     * create notification model
     */
    public function create($input){
        $users = User::where('role_id', 2)->where('firebase_token', '!=', null)->get();
        $users_count = 0;

        foreach($users as $user){
            $firebase = NotificationHelper::firebase_notification($user->firebase_token, $input['title'], $input['message'], ['navigation_type' => $input['navigation_type'], 'navigation_id' => isset($input['navigation_id']) ? $input['navigation_id'] : null]);
            
            // $input['user_id'] = $user->id;
            // dump($input);
            $notification = new Notification;
            $notification->title             = $input['title'];
            $notification->message           = $input['message'];
            $notification->navigation_type   = $input['navigation_type'];
            $notification->navigation_id     = isset($input['navigation_id']) ? $input['navigation_id'] : null;
            $notification->user_id           = $user->id;
            $notification->save();
            $users_count++;
        }

        // dd($users_count);

        if($users_count){
            return "Notification sent to " . $users_count . " users";
        }

        return "There is no users subscribed for notification to send the notification";
    }

    /**
     * list notification api for one user
     */
    public function list(){
        $user_id = Auth::id();
        $notifications = $this->model->where('user_id', $user_id)->get();

        $read = $this->model->where('user_id', $user_id)->update(['read' => 1]);

        return NotificationResource::collection($notifications);
    }

    /**
     * unread notifications count
     */
    public function unread(){
        $user_id = Auth::id();
        $notifications = $this->model->where('user_id', $user_id)->where('read', 0)->count();

        return $notifications;
    }
}
