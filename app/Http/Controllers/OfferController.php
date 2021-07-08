<?php

namespace App\Http\Controllers;

use App\DataTables\OfferDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offertype;
use App\Repositories\OfferRepository;
use Flash;
use App\Http\Controllers\AppBaseController;

use Illuminate\Http\Request;
use Response;

class OfferController extends AppBaseController
{
    /** @var  OfferRepository */
    private $offerRepository;

    public function __construct(OfferRepository $offerRepo)
    {
        $this->offerRepository = $offerRepo;
    }

    /**
     * Display a listing of the Offer.
     *
     * @param OfferDataTable $offerDataTable
     * @return Response
     */
    public function index(OfferDataTable $offerDataTable)
    {
        return $offerDataTable->render('offers.index');
    }


    public function type_offers()
    {

        $offers = Offertype::get();

        return view('offers.type', compact('offers'));


    }

    public function updatetype($id)
    {
        $offer = Offertype::find($id);

        return view('offers.edittype', compact('offer'));

    }

    public function updatetypeoffers(Request $request , $id){

        $offer = Offertype::find($id);

        $offer->update([
            'type'=>$request->type
        ]);

        Flash::success('OfferType updated successfully.');

        return redirect(route('type_offers'));


    }

    /**
     * Show the form for creating a new Offer.
     *
     * @return Response
     */
    public function create()
    {

        return view('offers.create');
    }

    /**
     * Store a newly created Offer in storage.
     *
     * @param CreateOfferRequest $request
     *
     * @return Response
     */
    public function store(CreateOfferRequest $request)
    {
        $input = $request->all();

        $offer = $this->offerRepository->create($input);

        Flash::success('Offer saved successfully.');

        return redirect(route('offers.index'));
    }

    /**
     * Display the specified Offer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        return view('offers.show')->with('offer', $offer);
    }

    /**
     * Show the form for editing the specified Offer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        return view('offers.edit')->with('offer', $offer);
    }

    /**
     * Update the specified Offer in storage.
     *
     * @param int $id
     * @param UpdateOfferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOfferRequest $request)
    {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        $offer = $this->offerRepository->update($request->all(), $id);

        Flash::success('Offer updated successfully.');

        return redirect(route('offers.index'));
    }

    /**
     * Remove the specified Offer from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $offer = $this->offerRepository->find($id);

        if (empty($offer)) {
            Flash::error('Offer not found');

            return redirect(route('offers.index'));
        }

        $this->offerRepository->delete($id);

        Flash::success('Offer deleted successfully.');

        return redirect(route('offers.index'));
    }
}
