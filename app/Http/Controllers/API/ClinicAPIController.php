<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClinicAPIRequest;
use App\Http\Requests\API\UpdateClinicAPIRequest;
use App\Models\Clinic;
use App\Repositories\ClinicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClinicController
 * @package App\Http\Controllers\API
 */

class ClinicAPIController extends AppBaseController
{
    /** @var  ClinicRepository */
    private $clinicRepository;

    public function __construct(ClinicRepository $clinicRepo)
    {
        $this->clinicRepository = $clinicRepo;
    }

    /**
     * Display a listing of the Clinic.
     * GET|HEAD /clinics
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clinics = $this->clinicRepository->list();

        return $this->sendResponse($clinics, 'Clinics retrieved successfully');
    }

    /**
     * Store a newly created Clinic in storage.
     * POST /clinics
     *
     * @param CreateClinicAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreateClinicAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $clinic = $this->clinicRepository->create($input);

    //     return $this->sendResponse($clinic->toArray(), 'Clinic saved successfully');
    // }

    /**
     * Display the specified Clinic.
     * GET|HEAD /clinics/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Clinic $clinic */
        $clinic = $this->clinicRepository->find($id);

        if ($clinic == false) {
            return $this->sendError('Clinic not found');
        }

        return $this->sendResponse($clinic, 'Clinic retrieved successfully');
    }

    /**
     * Update the specified Clinic in storage.
     * PUT/PATCH /clinics/{id}
     *
     * @param int $id
     * @param UpdateClinicAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateClinicAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Clinic $clinic */
    //     $clinic = $this->clinicRepository->find($id);

    //     if (empty($clinic)) {
    //         return $this->sendError('Clinic not found');
    //     }

    //     $clinic = $this->clinicRepository->update($input, $id);

    //     return $this->sendResponse($clinic->toArray(), 'Clinic updated successfully');
    // }

    /**
     * Remove the specified Clinic from storage.
     * DELETE /clinics/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Clinic $clinic */
    //     $clinic = $this->clinicRepository->find($id);

    //     if (empty($clinic)) {
    //         return $this->sendError('Clinic not found');
    //     }

    //     $clinic->delete();

    //     return $this->sendSuccess('Clinic deleted successfully');
    // }
}
