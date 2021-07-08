<?php

namespace App\Http\Controllers;

use App\DataTables\ComplainsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateComplainsRequest;
use App\Http\Requests\UpdateComplainsRequest;
use App\Repositories\ComplainsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ComplainsController extends AppBaseController
{
    /** @var  ComplainsRepository */
    private $complainsRepository;

    public function __construct(ComplainsRepository $complainsRepo)
    {
        $this->complainsRepository = $complainsRepo;
    }

    /**
     * Display a listing of the Complains.
     *
     * @param ComplainsDataTable $complainsDataTable
     * @return Response
     */
    public function index(ComplainsDataTable $complainsDataTable)
    {
        return $complainsDataTable->render('complains.index');
    }

    /**
     * Show the form for creating a new Complains.
     *
     * @return Response
     */
    public function create()
    {
        return view('complains.create');
    }

    /**
     * Store a newly created Complains in storage.
     *
     * @param CreateComplainsRequest $request
     *
     * @return Response
     */
    public function store(CreateComplainsRequest $request)
    {
        $input = $request->all();

        $complains = $this->complainsRepository->create($input);

        Flash::success('Complains saved successfully.');

        return redirect(route('complains.index'));
    }

    /**
     * Display the specified Complains.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $complains = $this->complainsRepository->find($id);

        if (empty($complains)) {
            Flash::error('Complains not found');

            return redirect(route('complains.index'));
        }

        return view('complains.show')->with('complains', $complains);
    }

    /**
     * Show the form for editing the specified Complains.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $complains = $this->complainsRepository->find($id);

        if (empty($complains)) {
            Flash::error('Complains not found');

            return redirect(route('complains.index'));
        }

        return view('complains.edit')->with('complains', $complains);
    }

    /**
     * Update the specified Complains in storage.
     *
     * @param  int              $id
     * @param UpdateComplainsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplainsRequest $request)
    {
        $complains = $this->complainsRepository->find($id);

        if (empty($complains)) {
            Flash::error('Complains not found');

            return redirect(route('complains.index'));
        }

        $complains = $this->complainsRepository->update($request->all(), $id);

        Flash::success('Complains updated successfully.');

        return redirect(route('complains.index'));
    }

    /**
     * Remove the specified Complains from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $complains = $this->complainsRepository->find($id);

        if (empty($complains)) {
            Flash::error('Complains not found');

            return redirect(route('complains.index'));
        }

        $this->complainsRepository->delete($id);

        Flash::success('Complains deleted successfully.');

        return redirect(route('complains.index'));
    }
}
