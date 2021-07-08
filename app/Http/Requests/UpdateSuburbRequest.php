<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Suburb;

class UpdateSuburbRequest extends FormRequest
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
        $rules = Suburb::$update_rules;
        $rules['name_en'] .= '|unique:suburbs,name_en,' . $this->route('suburb') . ',id,deleted_at,NULL';
        $rules['name_ar'] .= '|unique:suburbs,name_ar,' . $this->route('suburb') . ',id,deleted_at,NULL';
        
        return $rules;
    }
}
