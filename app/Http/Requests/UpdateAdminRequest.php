<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateAdminRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = User::$admin_update_rules;
        // dd($this->route('admin'));
        $rules['email'] .= "|unique:users,email," . $this->route('admin') . ",id,deleted_at,NULL";
        
        return $rules;
    }
}
