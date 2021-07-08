<?php

namespace App\Http\Controllers;

use App\DataTables\ContactUsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Repositories\ContactUsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContactUsController extends AppBaseController
{
    /** @var  ContactUsRepository */
    private $contactUsRepository;

    public function __construct(ContactUsRepository $contactUsRepo)
    {
        $this->contactUsRepository = $contactUsRepo;
    }

    /**
     * Display a listing of the ContactUs.
     *
     * @param ContactUsDataTable $contactUsDataTable
     * @return Response
     */
    public function index(ContactUsDataTable $contactUsDataTable)
    {
        return $contactUsDataTable->render('contactuses.index');
    }

    /**
     * Show the form for creating a new ContactUs.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactuses.create');
    }

    /**
     * Store a newly created ContactUs in storage.
     *
     * @param CreateContactUsRequest $request
     *
     * @return Response
     */
    public function store(CreateContactUsRequest $request)
    {
        $input = $request->all();

        $contactUs = $this->contactUsRepository->create($input);

        Flash::success('Contact Us saved successfully.');

        return redirect(route('contactuses.index'));
    }

    /**
     * Display the specified ContactUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactUs = $this->contactUsRepository->find($id);

        if (empty($contactUs)) {
            Flash::error('Contact Us not found');

            return redirect(route('contactuses.index'));
        }

        return view('contactuses.show')->with('contactUs', $contactUs);
    }

    /**
     * Show the form for editing the specified ContactUs.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactUs = $this->contactUsRepository->find($id);

        if (empty($contactUs)) {
            Flash::error('Contact Us not found');

            return redirect(route('contactuses.index'));
        }

        return view('contactuses.edit')->with('contactUs', $contactUs);
    }

    /**
     * Update the specified ContactUs in storage.
     *
     * @param  int              $id
     * @param UpdateContactUsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactUsRequest $request)
    {
        $contactUs = $this->contactUsRepository->find($id);

        if (empty($contactUs)) {
            Flash::error('Contact Us not found');

            return redirect(route('contactuses.index'));
        }

        $contactUs = $this->contactUsRepository->update($request->all(), $id);

        Flash::success('Contact Us updated successfully.');

        return redirect(route('contactuses.index'));
    }

    /**
     * Remove the specified ContactUs from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactUs = $this->contactUsRepository->find($id);

        if (empty($contactUs)) {
            Flash::error('Contact Us not found');

            return redirect(route('contactuses.index'));
        }

        $this->contactUsRepository->delete($id);

        Flash::success('Contact Us deleted successfully.');

        return redirect(route('contactuses.index'));
    }
}
