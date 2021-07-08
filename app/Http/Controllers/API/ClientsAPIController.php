<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientsAPIRequest;
use App\Http\Requests\API\UpdateClientsAPIRequest;
use App\Http\Requests\API\LoginClientsAPIRequest;
use App\Http\Requests\API\ChangePasswordClientsAPIRequest;
use App\Models\User;
use App\Repositories\ClientsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Socialite;

/**
 * Class ClientsController
 * @package App\Http\Controllers\API
 */

class ClientsAPIController extends AppBaseController
{
    /** @var  ClientsRepository */
    private $clientsRepository;

    public function __construct(ClientsRepository $clientsRepo)
    {
        $this->clientsRepository = $clientsRepo;
    }

    /**
     * Display a listing of the Clients.
     * GET|HEAD /clients
     *
     * @param Request $request
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $clients = $this->clientsRepository->all(
    //         $request->except(['skip', 'limit']),
    //         $request->get('skip'),
    //         $request->get('limit')
    //     );

    //     return $this->sendResponse($clients->toArray(), 'Clients retrieved successfully');
    // }

    /**
     * Store a newly created Clients in storage.
     * POST /clients
     *
     * @param CreateClientsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientsAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientsRepository->create($input);
        // dd($clients);
        return $this->sendResponse($clients, 'Clients saved successfully');
    }

    /**
     * Login Clients in storage.
     * POST /clients
     *
     * @param LoginClientsAPIRequest $request
     *
     * @return Response
     */
    public function login(LoginClientsAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientsRepository->login($input);

        if($clients){
            return $this->sendResponse($clients, trans('messages.login_ok'));
        }else{
            return $this->sendError(trans('messages.login_client_error1'));
        }
        
    }

    /**
     * Social Login/register Clients in storage
     * POST /clients
     *
     * @param Request $request
     *
     * @return Response
     */
    public function social_login(Request $request){
        $input = $request->all();

        $clients = $this->clientsRepository->social_login($input);
        // dd($clients);
        return $this->sendResponse($clients, trans('messages.login_ok'));
    }

    /**
     * Logout Clients
     * POST /clients
     * 
     * @return Response
     */
    public function logout(){
        $this->clientsRepository->logout();

        return $this->sendSuccess(trans('messages.logout'));
    }

    /**
     * Change client password
     * POST /clients
     * 
     * @param ChangePasswordClientsAPIRequest $request
     * 
     * @return Response
     */
    public function change_password(ChangePasswordClientsAPIRequest $request){
        $input = $request->all();

        $clients = $this->clientsRepository->changePassword($input);

        return $this->sendResponse($clients, trans('messages.change_password_ok'));
    }

    /**
     * Display the specified Clients.
     * GET|HEAD /clients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        /** @var Clients $clients */

        $clients = $this->clientsRepository->getOne();

        if (empty($clients)) {
            return $this->sendError('Clients not found');
        }

        return $this->sendResponse($clients, 'Clients retrieved successfully');
    }

    /**
     * Update the specified Clients in storage.
     *
     * @param UpdateClientsAPIRequest $request
     *
     * @return Response
     */
    public function update(UpdateClientsAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientsRepository->edit_profile($input);

        return $this->sendResponse($clients, trans('messages.edit_profile'));
    }

    public function send_code(Request $request){
        $input = $request->all();

        $client = $this->clientsRepository->send_code($input);
        
        if(isset($client['done'])){
            return $this->sendSuccess('Code sent successfully');
        }else{
            if($client['error'] == false){
                return $this->sendError('This phone number is not registered');
            }
            else{
                return $this->sendError($client['error']);
            }
        }
    }

    public function check_code(Request $request){
        $input = $request->all();

        $client = $this->clientsRepository->check_code($input);
        
        if($client){
            return $this->sendSuccess('Code matched successfully');
        }
        
        return $this->sendError("Error in Code");
    }

    public function forget_password(Request $request){
        $input = $request->all();

        $client = $this->clientsRepository->edit_password($input);
        
        if($client){
            return $this->sendSuccess('Password Changed successfully');
        }
        
        return $this->sendError("Error in Code");
    }

    /**
     * Remove the specified Clients from storage.
     * DELETE /clients/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Clients $clients */
    //     $clients = $this->clientsRepository->find($id);

    //     if (empty($clients)) {
    //         return $this->sendError('Clients not found');
    //     }

    //     $clients->delete();

    //     return $this->sendSuccess('Clients deleted successfully');
    // }

    // public function redirect()
    // {
    //     return Socialite::driver('twitter')->redirect();
    // }

    // public function callback(){
    //     $user = Socialite::driver('twitter')->user();

    //     return $this->sendResponse($user, 'Clients updated successfully');
    // }
}
