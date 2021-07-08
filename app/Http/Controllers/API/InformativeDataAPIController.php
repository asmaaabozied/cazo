<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInformativeDataAPIRequest;
use App\Http\Requests\API\UpdateInformativeDataAPIRequest;
use App\Models\InformativeData;
use App\Repositories\InformativeDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class InformativeDataController
 * @package App\Http\Controllers\API
 */

class InformativeDataAPIController extends AppBaseController
{
    /** @var  InformativeDataRepository */
    private $informativeDataRepository;

    public function __construct(InformativeDataRepository $informativeDataRepo)
    {
        $this->informativeDataRepository = $informativeDataRepo;
    }

    /**
     * Display a listing of the InformativeData.
     * GET|HEAD /informativeDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $informativeDatas = $this->informativeDataRepository->informative($request->data);

        return $this->sendResponse($informativeDatas, 'Informative Datas retrieved successfully');
    }

    /**
     * Store a newly created InformativeData in storage.
     * POST /informativeDatas
     *
     * @param CreateInformativeDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInformativeDataAPIRequest $request)
    {
        $input = $request->all();

        $informativeData = $this->informativeDataRepository->create($input);

        return $this->sendResponse($informativeData->toArray(), 'Informative Data saved successfully');
    }

    /**
     * Display the specified InformativeData.
     * GET|HEAD /informativeDatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var InformativeData $informativeData */
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            return $this->sendError('Informative Data not found');
        }

        return $this->sendResponse($informativeData->toArray(), 'Informative Data retrieved successfully');
    }

    /**
     * Update the specified InformativeData in storage.
     * PUT/PATCH /informativeDatas/{id}
     *
     * @param int $id
     * @param UpdateInformativeDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformativeDataAPIRequest $request)
    {
        $input = $request->all();

        /** @var InformativeData $informativeData */
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            return $this->sendError('Informative Data not found');
        }

        $informativeData = $this->informativeDataRepository->update($input, $id);

        return $this->sendResponse($informativeData->toArray(), 'InformativeData updated successfully');
    }

    /**
     * Remove the specified InformativeData from storage.
     * DELETE /informativeDatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var InformativeData $informativeData */
        $informativeData = $this->informativeDataRepository->find($id);

        if (empty($informativeData)) {
            return $this->sendError('Informative Data not found');
        }

        $informativeData->delete();

        return $this->sendSuccess('Informative Data deleted successfully');
    }
}
