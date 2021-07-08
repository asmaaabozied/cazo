<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComplainTypesAPIRequest;
use App\Http\Requests\API\UpdateComplainTypesAPIRequest;
use App\Models\ComplainTypes;
use App\Repositories\ComplainTypesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComplainTypesController
 * @package App\Http\Controllers\API
 */

class ComplainTypesAPIController extends AppBaseController
{
    /** @var  ComplainTypesRepository */
    private $complainTypesRepository;

    public function __construct(ComplainTypesRepository $complainTypesRepo)
    {
        $this->complainTypesRepository = $complainTypesRepo;
    }

    /**
     * Display a listing of the ComplainTypes.
     * GET|HEAD /complainTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $complainTypes = $this->complainTypesRepository->getAll();

        return $this->sendResponse($complainTypes, 'Complain Types retrieved successfully');
    }

    /**
     * Store a newly created ComplainTypes in storage.
     * POST /complainTypes
     *
     * @param CreateComplainTypesAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreateComplainTypesAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $complainTypes = $this->complainTypesRepository->create($input);

    //     return $this->sendResponse($complainTypes->toArray(), 'Complain Types saved successfully');
    // }

    /**
     * Display the specified ComplainTypes.
     * GET|HEAD /complainTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var ComplainTypes $complainTypes */
    //     $complainTypes = $this->complainTypesRepository->find($id);

    //     if (empty($complainTypes)) {
    //         return $this->sendError('Complain Types not found');
    //     }

    //     return $this->sendResponse($complainTypes->toArray(), 'Complain Types retrieved successfully');
    // }

    /**
     * Update the specified ComplainTypes in storage.
     * PUT/PATCH /complainTypes/{id}
     *
     * @param int $id
     * @param UpdateComplainTypesAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateComplainTypesAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var ComplainTypes $complainTypes */
    //     $complainTypes = $this->complainTypesRepository->find($id);

    //     if (empty($complainTypes)) {
    //         return $this->sendError('Complain Types not found');
    //     }

    //     $complainTypes = $this->complainTypesRepository->update($input, $id);

    //     return $this->sendResponse($complainTypes->toArray(), 'ComplainTypes updated successfully');
    // }

    /**
     * Remove the specified ComplainTypes from storage.
     * DELETE /complainTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var ComplainTypes $complainTypes */
    //     $complainTypes = $this->complainTypesRepository->find($id);

    //     if (empty($complainTypes)) {
    //         return $this->sendError('Complain Types not found');
    //     }

    //     $complainTypes->delete();

    //     return $this->sendSuccess('Complain Types deleted successfully');
    // }
}
