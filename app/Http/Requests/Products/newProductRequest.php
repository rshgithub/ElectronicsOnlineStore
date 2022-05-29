<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class newProductRequest extends FormRequest
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

            'name'=>'required|string|unique:products,name',
            'category_id'=>'required|numeric|exists:categories,id',
            'status' =>  'required|numeric|in:0,1',
            'description'=>'required|max:1000',
            'price'=>'required|string',
            'image'=>'required|image|mimes:jpg,png,jpeg'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'name.unique' => 'Name must be unique!',
            'category_id.required' => 'category_id is required!',
            'category_id.numeric' => 'category_id must be numeric!',
            'category_id.exists' => 'category_id must exist in categories table!',
            'status.required' => 'status is required!',
            'status.numeric' => 'status must be numeric!',
            'status.in:0,1' => 'status must be in:0,1!',
            'description.required' => 'description is required!',
            'description.max:1000' => 'description text max:1000!',
            'price.required' => 'price is required!',
            'price.string' => 'price must be string!',
            'image.mimes' => 'image directory must be jpg or png or jpeg!',
            'image.image' => 'file must be an image!',
            'image.required' => 'iomage is required'
        ];
    }
}
