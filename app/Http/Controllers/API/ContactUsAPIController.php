<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactUsAPIRequest;
use App\Http\Requests\API\UpdateContactUsAPIRequest;
use App\Models\ContactUs;
use App\Repositories\ContactUsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContactUsController
 * @package App\Http\Controllers\API
 */

class ContactUsAPIController extends AppBaseController
{
    /** @var  ContactUsRepository */
    private $contactUsRepository;

    public function __construct(ContactUsRepository $contactUsRepo)
    {
        $this->contactUsRepository = $contactUsRepo;
    }

    /**
     * Display a listing of the ContactUs.
     * GET|HEAD /contactuses
     *
     * @param Request $request
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $contactuses = $this->contactUsRepository->all(
    //         $request->except(['skip', 'limit']),
    //         $request->get('skip'),
    //         $request->get('limit')
    //     );

    //     return $this->sendResponse($contactuses->toArray(), 'Contactuses retrieved successfully');
    // }

    /**
     * Store a newly created ContactUs in storage.
     * POST /contactuses
     *
     * @param CreateContactUsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContactUsAPIRequest $request)
    {
        $input = $request->all();

        $contactUs = $this->contactUsRepository->create($input);

        return $this->sendResponse($contactUs->toArray(), trans('messages.contactus_message'));
    }

    /**
     * Display the specified ContactUs.
     * GET|HEAD /contactuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     /** @var ContactUs $contactUs */
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         return $this->sendError('Contact Us not found');
    //     }

    //     return $this->sendResponse($contactUs->toArray(), 'Contact Us retrieved successfully');
    // }

    /**
     * Update the specified ContactUs in storage.
     * PUT/PATCH /contactuses/{id}
     *
     * @param int $id
     * @param UpdateContactUsAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateContactUsAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var ContactUs $contactUs */
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         return $this->sendError('Contact Us not found');
    //     }

    //     $contactUs = $this->contactUsRepository->update($input, $id);

    //     return $this->sendResponse($contactUs->toArray(), 'ContactUs updated successfully');
    // }

    /**
     * Remove the specified ContactUs from storage.
     * DELETE /contactuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var ContactUs $contactUs */
    //     $contactUs = $this->contactUsRepository->find($id);

    //     if (empty($contactUs)) {
    //         return $this->sendError('Contact Us not found');
    //     }

    //     $contactUs->delete();

    //     return $this->sendSuccess('Contact Us deleted successfully');
    // }
}
