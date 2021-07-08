<?php

namespace App\Http\Controllers;

use App\DataTables\ClinicDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClinicRequest;
use App\Http\Requests\UpdateClinicRequest;
use App\Repositories\ClinicRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class ClinicController extends AppBaseController
{
    /** @var  ClinicRepository */
    private $clinicRepository;

    public function __construct(ClinicRepository $clinicRepo)
    {
        $this->clinicRepository = $clinicRepo;
    }

    /**
     * Display a listing of the Clinic.
     *
     * @param ClinicDataTable $clinicDataTable
     * @return Response
     */
    public function index(ClinicDataTable $clinicDataTable)
    {
        return $clinicDataTable->render('clinics.index');
    }

    /**
     * Show the form for creating a new Clinic.
     *
     * @return Response
     */
    public function create()
    {
        return view('clinics.create');
    }

    /**
     * Store a newly created Clinic in storage.
     *
     * @param CreateClinicRequest $request
     *
     * @return Response
     */
    public function store(CreateClinicRequest $request)
    {
        $input = $request->all();

        $clinic = $this->clinicRepository->create($input);

        Flash::success('Clinic saved successfully.');

        return redirect(route('clinics.index'));
    }

    /**
     * Display the specified Clinic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clinic = $this->clinicRepository->find($id);

        if (empty($clinic)) {
            Flash::error('Clinic not found');

            return redirect(route('clinics.index'));
        }

        if(Auth::user()->role_id == 3 && Auth::user()->clinic->id != $id){
            abort(403, 'Unauthorized action.');
        }

        return view('clinics.show')->with('clinic', $clinic);
    }

    /**
     * Show the form for editing the specified Clinic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clinic = $this->clinicRepository->find($id);

        if (empty($clinic)) {
            Flash::error('Clinic not found');

            return redirect(route('clinics.index'));
        }

        // dd($clinic);

        // if(Auth::user()->role_id == 3 && Auth::user()->clinic->id != $id){
        //     abort(403, 'Unauthorized action.');
        // }

        return view('clinics.edit')->with('clinic', $clinic);
    }

    /**
     * Update the specified Clinic in storage.
     *
     * @param  int              $id
     * @param UpdateClinicRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClinicRequest $request)
    {
        $clinic = $this->clinicRepository->find($id);

        if (empty($clinic)) {
            Flash::error('Clinic not found');

            return redirect(route('clinics.index'));
        }

        // if(Auth::user()->role_id == 3 && Auth::user()->clinic->id != $id){
        //     abort(403, 'Unauthorized action.');
        // }

        $clinic = $this->clinicRepository->update($request->all(), $id);

        Flash::success('Clinic updated successfully.');

        return redirect(route('clinics.index'));
    }

    /**
     * Remove the specified Clinic from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clinic = $this->clinicRepository->find($id);

        if (empty($clinic)) {
            Flash::error('Clinic not found');

            return redirect(route('clinics.index'));
        }

        if(Auth::user()->role_id == 3 && Auth::user()->clinic->id != $id){
            abort(403, 'Unauthorized action.');
        }

        $this->clinicRepository->delete($id);

        Flash::success('Clinic deleted successfully.');

        return redirect(route('clinics.index'));
    }
}
