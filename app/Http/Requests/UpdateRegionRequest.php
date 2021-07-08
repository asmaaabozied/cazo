<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Region;

class UpdateRegionRequest extends FormRequest
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
        $rules = Region::$update_rules;
        $rules['name_en'] .= '|unique:regions,name_en,' . $this->route('region') . ',id,deleted_at,NULL';
        $rules['name_ar'] .= '|unique:regions,name_ar,' . $this->route('region') . ',id,deleted_at,NULL';
        
        return $rules;
    }
}
