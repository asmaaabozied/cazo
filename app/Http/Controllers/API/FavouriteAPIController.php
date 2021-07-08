<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFavouriteAPIRequest;
use App\Http\Requests\API\UpdateFavouriteAPIRequest;
use App\Models\Favourite;
use App\Repositories\FavouriteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FavouriteController
 * @package App\Http\Controllers\API
 */

class FavouriteAPIController extends AppBaseController
{
    /** @var  FavouriteRepository */
    private $favouriteRepository;

    public function __construct(FavouriteRepository $favouriteRepo)
    {
        $this->favouriteRepository = $favouriteRepo;
    }

    /**
     * Display a listing of the Favourite.
     * GET|HEAD /favourites
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $favourites = $this->favouriteRepository->list();

        return $this->sendResponse($favourites, 'Favourites retrieved successfully');
    }

    /**
     * Store a newly created Favourite in storage.
     * POST /favourites
     *
     * @param CreateFavouriteAPIRequest $request
     *
     * @return Response
     */
    public function favourite(CreateFavouriteAPIRequest $request)
    {
        $input = $request->all();

        $favourite = $this->favouriteRepository->favourite($input);

        return $this->sendSuccess($favourite);
    }

    /**
     * Display the specified Favourite.
     * GET|HEAD /favourites/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var Favourite $favourite */
    //     $favourite = $this->favouriteRepository->find($id);

    //     if (empty($favourite)) {
    //         return $this->sendError('Favourite not found');
    //     }

    //     return $this->sendResponse($favourite->toArray(), 'Favourite retrieved successfully');
    // }

    /**
     * Update the specified Favourite in storage.
     * PUT/PATCH /favourites/{id}
     *
     * @param int $id
     * @param UpdateFavouriteAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateFavouriteAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Favourite $favourite */
    //     $favourite = $this->favouriteRepository->find($id);

    //     if (empty($favourite)) {
    //         return $this->sendError('Favourite not found');
    //     }

    //     $favourite = $this->favouriteRepository->update($input, $id);

    //     return $this->sendResponse($favourite->toArray(), 'Favourite updated successfully');
    // }

    /**
     * Remove the specified Favourite from storage.
     * DELETE /favourites/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Favourite $favourite */
    //     $favourite = $this->favouriteRepository->find($id);

    //     if (empty($favourite)) {
    //         return $this->sendError('Favourite not found');
    //     }

    //     $favourite->delete();

    //     return $this->sendSuccess('Favourite deleted successfully');
    // }
}
