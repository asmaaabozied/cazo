<?php

namespace App\Http\Controllers;

use App\DataTables\AdsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAdsRequest;
use App\Http\Requests\UpdateAdsRequest;
use App\Repositories\AdsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AdsController extends AppBaseController
{
    /** @var  AdsRepository */
    private $adsRepository;

    public function __construct(AdsRepository $adsRepo)
    {
        $this->adsRepository = $adsRepo;
    }

    /**
     * Display a listing of the Ads.
     *
     * @param AdsDataTable $adsDataTable
     * @return Response
     */
    public function index(AdsDataTable $adsDataTable)
    {
        return $adsDataTable->render('ads.index');
    }

    /**
     * Show the form for creating a new Ads.
     *
     * @return Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created Ads in storage.
     *
     * @param CreateAdsRequest $request
     *
     * @return Response
     */
    public function store(CreateAdsRequest $request)
    {
        $input = $request->all();

        $ads = $this->adsRepository->create($input);

        Flash::success('Ads saved successfully.');

        return redirect(route('ads.index'));
    }

    /**
     * Display the specified Ads.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error('Ads not found');

            return redirect(route('ads.index'));
        }

        return view('ads.show')->with('ads', $ads);
    }

    /**
     * Show the form for editing the specified Ads.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error('Ads not found');

            return redirect(route('ads.index'));
        }

        return view('ads.edit')->with('ads', $ads);
    }

    /**
     * Update the specified Ads in storage.
     *
     * @param  int              $id
     * @param UpdateAdsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdsRequest $request)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error('Ads not found');

            return redirect(route('ads.index'));
        }

        $ads = $this->adsRepository->update($request->all(), $id);

        Flash::success('Ads updated successfully.');

        return redirect(route('ads.index'));
    }

    /**
     * Remove the specified Ads from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ads = $this->adsRepository->find($id);

        if (empty($ads)) {
            Flash::error('Ads not found');

            return redirect(route('ads.index'));
        }

        $this->adsRepository->delete($id);

        Flash::success('Ads deleted successfully.');

        return redirect(route('ads.index'));
    }
}
