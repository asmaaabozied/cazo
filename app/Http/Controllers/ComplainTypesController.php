<?php

namespace App\Http\Controllers;

use App\DataTables\ComplainTypesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateComplainTypesRequest;
use App\Http\Requests\UpdateComplainTypesRequest;
use App\Repositories\ComplainTypesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ComplainTypesController extends AppBaseController
{
    /** @var  ComplainTypesRepository */
    private $complainTypesRepository;

    public function __construct(ComplainTypesRepository $complainTypesRepo)
    {
        $this->complainTypesRepository = $complainTypesRepo;
    }

    /**
     * Display a listing of the ComplainTypes.
     *
     * @param ComplainTypesDataTable $complainTypesDataTable
     * @return Response
     */
    public function index(ComplainTypesDataTable $complainTypesDataTable)
    {
        return $complainTypesDataTable->render('complain_types.index');
    }

    /**
     * Show the form for creating a new ComplainTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('complain_types.create');
    }

    /**
     * Store a newly created ComplainTypes in storage.
     *
     * @param CreateComplainTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateComplainTypesRequest $request)
    {
        $input = $request->all();

        $complainTypes = $this->complainTypesRepository->create($input);

        Flash::success('Complain Types saved successfully.');

        return redirect(route('complainTypes.index'));
    }

    /**
     * Display the specified ComplainTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $complainTypes = $this->complainTypesRepository->find($id);

        if (empty($complainTypes)) {
            Flash::error('Complain Types not found');

            return redirect(route('complainTypes.index'));
        }

        return view('complain_types.show')->with('complainTypes', $complainTypes);
    }

    /**
     * Show the form for editing the specified ComplainTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $complainTypes = $this->complainTypesRepository->find($id);

        if (empty($complainTypes)) {
            Flash::error('Complain Types not found');

            return redirect(route('complainTypes.index'));
        }

        return view('complain_types.edit')->with('complainTypes', $complainTypes);
    }

    /**
     * Update the specified ComplainTypes in storage.
     *
     * @param  int              $id
     * @param UpdateComplainTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplainTypesRequest $request)
    {
        $complainTypes = $this->complainTypesRepository->find($id);

        if (empty($complainTypes)) {
            Flash::error('Complain Types not found');

            return redirect(route('complainTypes.index'));
        }

        $complainTypes = $this->complainTypesRepository->update($request->all(), $id);

        Flash::success('Complain Types updated successfully.');

        return redirect(route('complainTypes.index'));
    }

    /**
     * Remove the specified ComplainTypes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $complainTypes = $this->complainTypesRepository->find($id);

        if (empty($complainTypes)) {
            Flash::error('Complain Types not found');

            return redirect(route('complainTypes.index'));
        }

        $this->complainTypesRepository->delete($id);

        Flash::success('Complain Types deleted successfully.');

        return redirect(route('complainTypes.index'));
    }
}
