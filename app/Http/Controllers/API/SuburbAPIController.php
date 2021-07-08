<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSuburbAPIRequest;
use App\Http\Requests\API\UpdateSuburbAPIRequest;
use App\Models\Suburb;
use App\Repositories\SuburbRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SuburbController
 * @package App\Http\Controllers\API
 */

class SuburbAPIController extends AppBaseController
{
    /** @var  SuburbRepository */
    private $suburbRepository;

    public function __construct(SuburbRepository $suburbRepo)
    {
        $this->suburbRepository = $suburbRepo;
    }

    /**
     * Display a listing of the Suburb.
     * GET|HEAD /suburbs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $suburbs = $this->suburbRepository->list($request);

        return $this->sendResponse($suburbs, 'Suburbs retrieved successfully');
    }

    /**
     * Store a newly created Suburb in storage.
     * POST /suburbs
     *
     * @param CreateSuburbAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreateSuburbAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $suburb = $this->suburbRepository->create($input);

    //     return $this->sendResponse($suburb->toArray(), 'Suburb saved successfully');
    // }

    /**
     * Display the specified Suburb.
     * GET|HEAD /suburbs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var Suburb $suburb */
    //     $suburb = $this->suburbRepository->find($id);

    //     if (empty($suburb)) {
    //         return $this->sendError('Suburb not found');
    //     }

    //     return $this->sendResponse($suburb->toArray(), 'Suburb retrieved successfully');
    // }

    /**
     * Update the specified Suburb in storage.
     * PUT/PATCH /suburbs/{id}
     *
     * @param int $id
     * @param UpdateSuburbAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateSuburbAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Suburb $suburb */
    //     $suburb = $this->suburbRepository->find($id);

    //     if (empty($suburb)) {
    //         return $this->sendError('Suburb not found');
    //     }

    //     $suburb = $this->suburbRepository->update($input, $id);

    //     return $this->sendResponse($suburb->toArray(), 'Suburb updated successfully');
    // }

    /**
     * Remove the specified Suburb from storage.
     * DELETE /suburbs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Suburb $suburb */
    //     $suburb = $this->suburbRepository->find($id);

    //     if (empty($suburb)) {
    //         return $this->sendError('Suburb not found');
    //     }

    //     $suburb->delete();

    //     return $this->sendSuccess('Suburb deleted successfully');
    // }
}
