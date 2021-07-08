<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Http\Resources\Client as ClientResource;
use App\Http\Resources\LoggedClient;
use App\Helpers\FileUpload;
use App\Helpers\SMS;
use Auth;

/**
 * Class ClientsRepository
 * @package App\Repositories
 * @version June 11, 2020, 9:46 am UTC
*/

class ClientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'birth_date',
        'phone_number',
        'image',
        'gender',
        'google_id',
        'facebook_id',
        'twitter_id',
        'role_id',
        'firebase_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return User
     */
    public function create($input)
    {
        $header  = request()->header('Accept-Language');

        if (request()->hasFile('image')) {
            $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
        }

        $input['password']  = bcrypt($input['password']);
        $input['role_id']   = 2; 

        $client = new User();
        $client->fill($input)->save();

        $token = $client->createToken('Laravel Personal Access Account')->accessToken;
        $client->token  = $token;

        return new LoggedClient($client);
    }

    /**
     * Login user
     * 
     * @param array $input
     * 
     * @return User
     */
    public function login($input){
        $creds = [];
        $creds['password'] = $input['password'];
        if(filter_var($input['email'], FILTER_VALIDATE_EMAIL)){
            $creds['email'] = $input['email'];
        }else{
            $creds['phone_number'] = $input['email'];
        }

        if(Auth::attempt($creds)) {
            $client = Auth::user();
            
            if(isset($input['firebase_token']) && $input['firebase_token'] != null){
                $client->firebase_token = $input['firebase_token'];
                $client->save();
            }

            $token = $client->createToken('Laravel Password Grant Client')->accessToken;
            $client->token  = $token;

            return new LoggedClient($client);
        } else {
            return false;
        }
    }

    /**
     * Login user
     * 
     * @param array $input
     * 
     * @return User
     */
    public function social_login($input){
        $client = $this->model->where($input['social_login'] . '_id', $input[$input['social_login'] . '_id'])->where('social_login', $input['social_login'])->first();

        if($client) {
            
            if(isset($input['firebase_token']) && $input['firebase_token'] != null){
                $client->firebase_token = $input['firebase_token'];
                $client->save();
            }

            $token = $client->createToken('Laravel Password Grant Client')->accessToken;
            $client->token  = $token;

            
        } else {
            if (request()->hasFile('image')) {
                $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
            }

            $input['role_id']   = 2; 
    
            $client = new User();
            $client->fill($input)->save();
    
        }

        $token = $client->createToken('Laravel Personal Access Account')->accessToken;
        $client->token  = $token;

        return new LoggedClient($client);
    }

    /**
     * Logout user
     * 
     * @param array $input
     * 
     * @return boolean
     */
    public function logout(){
        Auth::user()->token()->revoke();
        return true;
    }

    /**
     * Change User Password
     * 
     * @param array $input
     * 
     * @return boolean
     */
    public function changePassword($input){
        $client = Auth::user();

        $client->password = bcrypt($input['new_password']);
        $client->save();

        return true;
    }

    /**
     * Update user Data
     * 
     * @param array $input
     * 
     * @return User
     */
    public function edit_profile($input){
        $client = Auth::user();

        if (request()->hasFile('image')) {
            $input['image'] = FileUpload::uploadFile('upload/Clients', request()->file('image'), '-clients-');
        }

        if(isset($input['password'])){
            unset($input['password']);
        }

        $client->fill($input)->save();

        return new ClientResource($client);
    }

    /**
     * get one client data
     */
    public function getOne(){
        $client    = Auth::user();

        return new ClientResource($client);
    }

    /**
     * send code for verfication
     */
    public function send_code($input){
        $client = $this->model->where('phone_number', $input['phone_number'])->first();
        $return = [];
        if($client){
            $code = rand ( 10000 , 99999);
            $response = SMS::sendSms($input['phone_number'], 'Your verfication code is ' . $code);
            if (array_key_exists('code', $response)){
				$return['error'] = $response['message'];
			}else{
				if (array_key_exists('sid', $response)){
                    $client->code = $code;
                    $client->save();
                    $return['done'] = true;
				}
			}
        }else{
            $return['error'] = false;
        }

        return $return;
    }

    /**
     * check code for verfication
     */
    public function check_code($input){
        $client = $this->model->where('code', $input['code'])->first();

        if($client){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Update user Data
     * 
     * @param array $input
     * 
     * @return User
     */
    public function edit_password($input){
        $client = $this->model->where('code', $input['code'])->first();

        $client->password = bcrypt($input['new_password']);
        $client->code     = "";
        $client->save();

        return new ClientResource($client);
    }

    /**
     * Get Clients Count for Dashboard
     * 
     * @return int
     */
    public function count(){
        $clients = $this->model->count();

        return $clients;
    }
}
