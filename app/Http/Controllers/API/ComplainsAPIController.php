<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComplainsAPIRequest;
use App\Http\Requests\API\UpdateComplainsAPIRequest;
use App\Models\Complains;
use App\Repositories\ComplainsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ComplainsController
 * @package App\Http\Controllers\API
 */

class ComplainsAPIController extends AppBaseController
{
    /** @var  ComplainsRepository */
    private $complainsRepository;

    public function __construct(ComplainsRepository $complainsRepo)
    {
        $this->complainsRepository = $complainsRepo;
    }

    /**
     * Display a listing of the Complains.
     * GET|HEAD /complains
     *
     * @param Request $request
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $complains = $this->complainsRepository->all(
    //         $request->except(['skip', 'limit']),
    //         $request->get('skip'),
    //         $request->get('limit')
    //     );

    //     return $this->sendResponse($complains->toArray(), 'Complains retrieved successfully');
    // }

    /**
     * Store a newly created Complains in storage.
     * POST /complains
     *
     * @param CreateComplainsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComplainsAPIRequest $request)
    {
        $input = $request->all();

        $complains = $this->complainsRepository->apiComplain($input);

        return $this->sendResponse($complains->toArray(), 'Complains saved successfully');
    }

    /**
     * Display the specified Complains.
     * GET|HEAD /complains/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var Complains $complains */
    //     $complains = $this->complainsRepository->find($id);

    //     if (empty($complains)) {
    //         return $this->sendError('Complains not found');
    //     }

    //     return $this->sendResponse($complains->toArray(), 'Complains retrieved successfully');
    // }

    /**
     * Update the specified Complains in storage.
     * PUT/PATCH /complains/{id}
     *
     * @param int $id
     * @param UpdateComplainsAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateComplainsAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Complains $complains */
    //     $complains = $this->complainsRepository->find($id);

    //     if (empty($complains)) {
    //         return $this->sendError('Complains not found');
    //     }

    //     $complains = $this->complainsRepository->update($input, $id);

    //     return $this->sendResponse($complains->toArray(), 'Complains updated successfully');
    // }

    /**
     * Remove the specified Complains from storage.
     * DELETE /complains/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Complains $complains */
    //     $complains = $this->complainsRepository->find($id);

    //     if (empty($complains)) {
    //         return $this->sendError('Complains not found');
    //     }

    //     $complains->delete();

    //     return $this->sendSuccess('Complains deleted successfully');
    // }
}
