<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class UpdateCategoryRequest extends FormRequest
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
        $rules = Category::$update_rules;
        $rules['name_en'] .= '|unique:categories,name_en,' . $this->route('category') . ',id,deleted_at,NULL';
        $rules['name_ar'] .= '|unique:categories,name_ar,' . $this->route('category') . ',id,deleted_at,NULL';
        
        return $rules;
    }
}
