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

            'name'=>'required|string',
            'category_id'=>'required|numeric|exists:categories,id',
            'status' =>  'required|numeric|in:0,1',
            'description'=>'required|max:1000',
            'price'=>'required|numeric',
            'image'=>'required|image|mimes:jpg,png,jpeg'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.string' => 'Name must be string!',
            'category_id.required' => 'category id is required!',
            'category_id.numeric' => 'category id must be numeric!',
            'category_id.exists' => 'category id must exist in categories table!',
            'status.required' => 'status is required!',
            'status.numeric' => 'status must be numeric!',
            'status.in:0,1' => 'status must be in:0,1!',
            'description.required' => 'description is required!',
            'description.max:1000' => 'description text max:1000!',
            'price.required' => 'price is required!',
            'price.numeric' => 'price must be numeric!',
            'image.mimes' => 'image directory must be jpg or png or jpeg!',
            'image.image' => 'file must be an image!',
            'image.required' => 'image is required!',
        ];
    }
}
