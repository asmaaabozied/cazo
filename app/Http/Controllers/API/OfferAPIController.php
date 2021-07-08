<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOfferAPIRequest;
use App\Http\Requests\API\UpdateOfferAPIRequest;
use App\Models\Offer;
use App\Repositories\OfferRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OfferController
 * @package App\Http\Controllers\API
 */

class OfferAPIController extends AppBaseController
{
    /** @var  OfferRepository */
    private $offerRepository;

    public function __construct(OfferRepository $offerRepo)
    {
        $this->offerRepository = $offerRepo;
    }

    /**
     * Display a listing of the Offer.
     * GET|HEAD /offers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $offers = $this->offerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($offers->toArray(), 'Offers retrieved successfully');
    }

    /**
     * Store a newly created Offer in storage.
     * POST /offers
     *
     * @param CreateOfferAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOfferAPIRequest $request)
    {
        $input = $request->all();

        $offer = $this->offerRepository->create($input);

        return $this->sendResponse($offer->toArray(), 'Offer saved successfully');
    }

    /**
     * Display the specified Offer.
     * GET|HEAD /offers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Offer $offer */
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            return $this->sendError('Offer not found');
        }

        return $this->sendResponse($offer->toArray(), 'Offer retrieved successfully');
    }

    /**
     * Update the specified Offer in storage.
     * PUT/PATCH /offers/{id}
     *
     * @param int $id
     * @param UpdateOfferAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfferAPIRequest $request)
    {
        $input = $request->all();

        /** @var Offer $offer */
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            return $this->sendError('Offer not found');
        }

        $offer = $this->offerRepository->update($input, $id);

        return $this->sendResponse($offer->toArray(), 'Offer updated successfully');
    }

    /**
     * Remove the specified Offer from storage.
     * DELETE /offers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Offer $offer */
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            return $this->sendError('Offer not found');
        }

        $offer->delete();

        return $this->sendSuccess('Offer deleted successfully');
    }
}
