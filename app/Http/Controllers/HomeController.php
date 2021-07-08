<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientsRepository;
use App\Repositories\BookingRepository;
use App\Repositories\ClinicRepository;
use App\Repositories\SpecializationRepository;
use App\Repositories\ComplainsRepository;
use App\Repositories\ReviewRepository;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /** @var  ClientsRepository */
    private $clientsRepository;
    /** @var  BookingRepository */
    private $bookingRepository;
    /** @var  ClinicRepository */
    private $clinicRepository;
    /** @var  SpecializationRepository */
    private $specializationRepository;
    /** @var  ComplainsRepository */
    private $complainsRepository;
    /** @var  ReviewRepository */
    private $reviewRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientsRepository $clientsRepo, BookingRepository $bookingRepo, ClinicRepository $clinicRepo,
                                SpecializationRepository $specializationRepo, ComplainsRepository $complainsRepo, ReviewRepository $reviewRepo)
    {
        $this->middleware('auth');

        $this->clientsRepository           = $clientsRepo;
        $this->bookingRepository           = $bookingRepo;
        $this->clinicRepository            = $clinicRepo;
        $this->specializationRepository    = $specializationRepo;
        $this->complainsRepository         = $complainsRepo;
        $this->reviewRepository            = $reviewRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients_count            = $this->clientsRepository->count();
        $bookings_count           = $this->bookingRepository->count();
        $clinics_count            = $this->clinicRepository->count();
        $specializations_count    = $this->specializationRepository->count();
        $complains_count          = $this->complainsRepository->count();
        $reviews_count            = $this->reviewRepository->count();

        return view('home')->with(['clients' => $clients_count, 'bookings' => $bookings_count, 'clinics' => $clinics_count,
                                   'specializations' => $specializations_count, 'complains' => $complains_count, 'reviews' => $reviews_count]);
    }

    public function today_bookings(){
        $today_bookings = $this->bookingRepository->today();
    
        return DataTables::of($today_bookings)->addColumn('action', function($row){
            return "<div class='btn-group'><a href='". route('bookings.show', $row->id) ."' class='btn btn-default btn-xs'><span class='tooltiptext'>Show</span><i class='glyphicon glyphicon-eye-open'></i></a><a href='". route('bookings.edit', $row->id) ."' class='btn btn-default btn-xs'><span class='tooltiptext'>Edit</span><i class='glyphicon glyphicon-edit'></i></a></div>";
        })->editColumn('created_at', function ($row) {
            //change over here
            return $row->created_at->format('H:i - d-m-Y');
        })->make(true);
    }
}
