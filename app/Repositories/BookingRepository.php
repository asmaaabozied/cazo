<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\BaseRepository;
use Auth;
use App\Helpers\FileUpload;
use App\Helpers\Notification as NotificationHelper;
use App\Models\Specialization;
use App\Models\WorkingDaysHours;
use App\Models\BookingImages;
use App\Models\Coupon;
use App\Models\Notification;
use Illuminate\Support\Str;
use App\Http\Resources\Booking as BookingResourse;
use Carbon\Carbon;

/**
 * Class BookingRepository
 * @package App\Repositories
 * @version July 22, 2020, 3:14 pm UTC
*/

class BookingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'specialization_id',
        'fee',
        'offer',
        'day',
        'hour',
        'coupon',
        'status',
        'code'
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
        return Booking::class;
    }

    /**
     * create model for api
     */
    public function createAPI($input){
        $user  = Auth::user();

        if($user->name == null || $user->email == null || $user->phone_number == null){
            return "uncompleted data";
        }

        $date  = new \DateTime('@' . request()->server('REQUEST_TIME'));

        $specialization = Specialization::where('id', $input['specialization_id'])->first();
        $input['fee']   = $specialization->fee;
        if($specialization->hasOffer($date)){
            $input['offer'] = $specialization->offer->offer_value;
        }

        $hour   = WorkingDaysHours::where('id', $input['hour_id'])->first();
        $input['hour'] = $hour->time;
        unset($input['hour_id']);

        if($this->model->where('hour', $input['hour'])->where('specialization_id', $input['specialization_id'])->where('day', $input['day'])->exists()){
            return false;
        }

        $input['status']   = '1';
        $input['code']     = Str::random(8);
        $input['user_id']  = $user->id;

        if(isset($input['coupon'])){
            $coupon = Coupon::where('code', $input['coupon'])->whereDate('start_date', '<=', \Carbon\Carbon::now())->whereDate('end_date', '>=', \Carbon\Carbon::now())->first();

            if($coupon){
                $input['coupon_offer'] = $coupon->discount;
            }
            
        }

        $booking = $this->model;
        $booking->fill($input)->save();

        $title              = "Booking Done";
        $message            = "Your Booking for " . $booking->specialization->name_en . " in " . $input['day'] . " at " . $input['hour'] . " is done";
        $navigation_type    = "Booking";
        $navigation_id      = "New";
        $firebase = NotificationHelper::firebase_notification($user->firebase_token, $title, $message, ['navigation_type' => $navigation_type, 'navigation_id' => $navigation_id]);

        $notification = new Notification;
        $notification->title             = $title;
        $notification->message           = $message;
        $notification->navigation_type   = $navigation_type;
        $notification->navigation_id     = $navigation_id;
        $notification->user_id           = $user->id;
        $notification->save();

        $to      = $specialization->clinic->admin->email;
        $subject = 'New Booking For Cazo';
        $message  = '<b>New Booking for</b> : '. $specialization->name_en . '<br>';
        $message .= '<b>User Name</b> : '. $user->name . '<br>';
        $message .= '<b>User Phone</b> : '. $user->phone_number ? $user->phone_number : 'Unavailable' . '<br>';
        $message .= '<b>Booked Date</b> : '. $input['day'] . '<br>';
        $message .= '<b>Booked Hour</b> : '. $input['hour'] . '<br>';
        $headers = array(
            'From' => 'info@cazo.com',
            'X-Mailer' => 'PHP/' . phpversion(),
            'Content-type' => 'text/html;charset=UTF-8'
        );

        mail($to, $subject, $message, $headers);

        $images = [];

        if(request()->hasFile('images')){
            foreach(request()->file('images') as $file){
                $image = FileUpload::uploadFile('upload/Booking', $file, '-booking-');
                $booking_image = new BookingImages;
                $booking_image->image = $image;
                array_push($images, $booking_image);
            }
        }

        $booking->images()->saveMany($images);

        return $booking;

    }

    /**
     * list user bookings
     */
    public function userBookings(){
        $user  = Auth::user();
        $bookings = $this->model->where('user_id', $user->id)->with('specialization')->get();

        return BookingResourse::collection($bookings);
    }

    public function cancelBooking($id){
        $booking = $this->model->where('id', $id)->with('specialization')->first();
        // dd($booking);
        if($booking->status == 1){
            $booking->status = 3;
            $booking->save();
            return new BookingResourse($booking);
        }

        return false;
    }

    public function find($id, $columns = []){
        $booking = $this->model->where('id', $id)->with('specialization')->first();

        if($booking){
            return new BookingResourse($booking);
        }else{
            return false;
        }
        
    }

    /**
     * Get Bookings Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $bookings = $this->model;

        // dd(Auth::user()->clinic);
        if(Auth::user()->role_id == 3){
            $bookings = $bookings->whereIn('specialization_id', Auth::user()->clinic ? Auth::user()->clinic->specializationsIds() : []);
        }

        $bookings = $bookings->count();

        return $bookings;
    }

    public function today(){
        $today_bookings = $this->model->latest()->whereDate('created_at', Carbon::today());

        // dd(Auth::user()->clinic);
        if(Auth::user()->role_id == 3){
            $today_bookings = $today_bookings->whereIn('specialization_id', Auth::user()->clinic ? Auth::user()->clinic->specializationsIds() : []);
        }

        $today_bookings = $today_bookings->with('specialization', 'user')->get();

        return $today_bookings;
    }
}
