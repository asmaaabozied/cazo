<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBookingAPIRequest;
use App\Http\Requests\API\UpdateBookingAPIRequest;
use App\Models\Booking;
use App\Repositories\BookingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BookingController
 * @package App\Http\Controllers\API
 */

class BookingAPIController extends AppBaseController
{
    /** @var  BookingRepository */
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     * GET|HEAD /bookings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->userBookings();

        return $this->sendResponse($bookings, 'Bookings retrieved successfully');
    }

    /**
     * Store a newly created Booking in storage.
     * POST /bookings
     *
     * @param CreateBookingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingAPIRequest $request)
    {
        $input = $request->all();

        $booking = $this->bookingRepository->createAPI($input);

        if($booking){
            return $this->sendResponse($booking, trans('messages.booking_ok'));
        }
        elseif($booking == "uncompleted data"){
            return $this->sendError(trans('messages.missing_data'));
        }
        else{
            return $this->sendError(trans('messages.booking_error'));
        }

        
    }

    /**
     * Cancel the specified Booking
     * POST|HEAD /booking/cancel/{id}
     * 
     * @param int $id
     * 
     * @return Response
     */
    public function cancel($id){
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $cancel = $this->bookingRepository->cancelBooking($id);
        
        if($cancel){
            return $this->sendResponse($cancel, trans('messages.cancel_ok'));
        }else{
            return $this->sendError(trans('messages.cancel_error'));
        }
    }

    /**
     * Display the specified Booking.
     * GET|HEAD /bookings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Booking $booking */
        $booking = $this->bookingRepository->find($id);

        if ($booking) {
            return $this->sendResponse($booking, 'Booking retrieved successfully');
        }
        return $this->sendError('Booking not found');
        
    }

    /**
     * Update the specified Booking in storage.
     * PUT/PATCH /bookings/{id}
     *
     * @param int $id
     * @param UpdateBookingAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateBookingAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Booking $booking */
    //     $booking = $this->bookingRepository->find($id);

    //     if (empty($booking)) {
    //         return $this->sendError('Booking not found');
    //     }

    //     $booking = $this->bookingRepository->update($input, $id);

    //     return $this->sendResponse($booking->toArray(), 'Booking updated successfully');
    // }

    /**
     * Remove the specified Booking from storage.
     * DELETE /bookings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Booking $booking */
    //     $booking = $this->bookingRepository->find($id);

    //     if (empty($booking)) {
    //         return $this->sendError('Booking not found');
    //     }

    //     $booking->delete();

    //     return $this->sendSuccess('Booking deleted successfully');
    // }
}
