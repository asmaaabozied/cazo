<?php

namespace App\Http\Controllers;

use App\DataTables\SuburbDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSuburbRequest;
use App\Http\Requests\UpdateSuburbRequest;
use App\Repositories\SuburbRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;

class SuburbController extends AppBaseController
{
    /** @var  SuburbRepository */
    private $suburbRepository;

    public function __construct(SuburbRepository $suburbRepo)
    {
        $this->suburbRepository = $suburbRepo;
    }

    /**
     * Display a listing of the Suburb.
     *
     * @param SuburbDataTable $suburbDataTable
     * @return Response
     */
    public function index(SuburbDataTable $suburbDataTable)
    {
        return $suburbDataTable->render('suburbs.index');
    }

    /**
     * Show the form for creating a new Suburb.
     *
     * @return Response
     */
    public function create()
    {
        return view('suburbs.create');
    }

    /**
     * Store a newly created Suburb in storage.
     *
     * @param CreateSuburbRequest $request
     *
     * @return Response
     */
    public function store(CreateSuburbRequest $request)
    {
        $input = $request->all();

        $suburb = $this->suburbRepository->create($input);

        Flash::success('Suburb saved successfully.');

        return redirect(route('suburbs.index'));
    }

    /**
     * Display the specified Suburb.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suburb = $this->suburbRepository->find($id);

        if (empty($suburb)) {
            Flash::error('Suburb not found');

            return redirect(route('suburbs.index'));
        }

        return view('suburbs.show')->with('suburb', $suburb);
    }

    /**
     * Show the form for editing the specified Suburb.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suburb = $this->suburbRepository->find($id);

        if (empty($suburb)) {
            Flash::error('Suburb not found');

            return redirect(route('suburbs.index'));
        }

        return view('suburbs.edit')->with('suburb', $suburb);
    }

    /**
     * Update the specified Suburb in storage.
     *
     * @param  int              $id
     * @param UpdateSuburbRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSuburbRequest $request)
    {
        $suburb = $this->suburbRepository->find($id);

        if (empty($suburb)) {
            Flash::error('Suburb not found');

            return redirect(route('suburbs.index'));
        }

        $suburb = $this->suburbRepository->update($request->all(), $id);

        Flash::success('Suburb updated successfully.');

        return redirect(route('suburbs.index'));
    }

    /**
     * Remove the specified Suburb from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suburb = $this->suburbRepository->find($id);

        if (empty($suburb)) {
            Flash::error('Suburb not found');

            return redirect(route('suburbs.index'));
        }

        $this->suburbRepository->delete($id);

        Flash::success('Suburb deleted successfully.');

        return redirect(route('suburbs.index'));
    }

    /**
     * List of Suburbs for select
     */
    public function select(Request $request){
        $suburbs = $this->suburbRepository->list($request);

        return $this->sendResponse($suburbs, "Suburbs retrived successfully");
    }
}
