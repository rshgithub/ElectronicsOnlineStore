<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class updateCategoryRequest extends FormRequest
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
        return [

            'title'=>'required|string|unique:categories,title'.$this->category_id,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required!',
            'title.string' => 'title must be string!',
            'title.unique' => 'title must be unique!',
        ];
    }
}
