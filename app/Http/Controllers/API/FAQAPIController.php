<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFAQAPIRequest;
use App\Http\Requests\API\UpdateFAQAPIRequest;
use App\Models\FAQ;
use App\Repositories\FAQRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FAQController
 * @package App\Http\Controllers\API
 */

class FAQAPIController extends AppBaseController
{
    /** @var  FAQRepository */
    private $fAQRepository;

    public function __construct(FAQRepository $fAQRepo)
    {
        $this->fAQRepository = $fAQRepo;
    }

    /**
     * Display a listing of the FAQ.
     * GET|HEAD /fAQS
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fAQS = $this->fAQRepository->getAll();

        return $this->sendResponse($fAQS, 'F A Q S retrieved successfully');
    }

    /**
     * Store a newly created FAQ in storage.
     * POST /fAQS
     *
     * @param CreateFAQAPIRequest $request
     *
     * @return Response
     */
    // public function store(CreateFAQAPIRequest $request)
    // {
    //     $input = $request->all();

    //     $fAQ = $this->fAQRepository->create($input);

    //     return $this->sendResponse($fAQ->toArray(), 'F A Q saved successfully');
    // }

    /**
     * Display the specified FAQ.
     * GET|HEAD /fAQS/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var FAQ $fAQ */
    //     $fAQ = $this->fAQRepository->find($id);

    //     if (empty($fAQ)) {
    //         return $this->sendError('F A Q not found');
    //     }

    //     return $this->sendResponse($fAQ->toArray(), 'F A Q retrieved successfully');
    // }

    /**
     * Update the specified FAQ in storage.
     * PUT/PATCH /fAQS/{id}
     *
     * @param int $id
     * @param UpdateFAQAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateFAQAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var FAQ $fAQ */
    //     $fAQ = $this->fAQRepository->find($id);

    //     if (empty($fAQ)) {
    //         return $this->sendError('F A Q not found');
    //     }

    //     $fAQ = $this->fAQRepository->update($input, $id);

    //     return $this->sendResponse($fAQ->toArray(), 'FAQ updated successfully');
    // }

    /**
     * Remove the specified FAQ from storage.
     * DELETE /fAQS/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var FAQ $fAQ */
    //     $fAQ = $this->fAQRepository->find($id);

    //     if (empty($fAQ)) {
    //         return $this->sendError('F A Q not found');
    //     }

    //     $fAQ->delete();

    //     return $this->sendSuccess('F A Q deleted successfully');
    // }
}
