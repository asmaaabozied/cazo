<?php

namespace App\Http\Controllers;

use App\DataTables\FAQDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFAQRequest;
use App\Http\Requests\UpdateFAQRequest;
use App\Repositories\FAQRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FAQController extends AppBaseController
{
    /** @var  FAQRepository */
    private $fAQRepository;

    public function __construct(FAQRepository $fAQRepo)
    {
        $this->fAQRepository = $fAQRepo;
    }

    /**
     * Display a listing of the FAQ.
     *
     * @param FAQDataTable $fAQDataTable
     * @return Response
     */
    public function index(FAQDataTable $fAQDataTable)
    {
        return $fAQDataTable->render('f_a_q_s.index');
    }

    /**
     * Show the form for creating a new FAQ.
     *
     * @return Response
     */
    public function create()
    {
        return view('f_a_q_s.create');
    }

    /**
     * Store a newly created FAQ in storage.
     *
     * @param CreateFAQRequest $request
     *
     * @return Response
     */
    public function store(CreateFAQRequest $request)
    {
        $input = $request->all();

        $fAQ = $this->fAQRepository->create($input);

        Flash::success('F A Q saved successfully.');

        return redirect(route('fAQS.index'));
    }

    /**
     * Display the specified FAQ.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('F A Q not found');

            return redirect(route('fAQS.index'));
        }

        return view('f_a_q_s.show')->with('fAQ', $fAQ);
    }

    /**
     * Show the form for editing the specified FAQ.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('F A Q not found');

            return redirect(route('fAQS.index'));
        }

        return view('f_a_q_s.edit')->with('fAQ', $fAQ);
    }

    /**
     * Update the specified FAQ in storage.
     *
     * @param  int              $id
     * @param UpdateFAQRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFAQRequest $request)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('F A Q not found');

            return redirect(route('fAQS.index'));
        }

        $fAQ = $this->fAQRepository->update($request->all(), $id);

        Flash::success('F A Q updated successfully.');

        return redirect(route('fAQS.index'));
    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('F A Q not found');

            return redirect(route('fAQS.index'));
        }

        $this->fAQRepository->delete($id);

        Flash::success('F A Q deleted successfully.');

        return redirect(route('fAQS.index'));
    }
}
