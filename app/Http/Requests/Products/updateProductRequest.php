<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
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

            'name'=>'sometimes|string'.$this->product_id,
            'category_id'=>'sometimes|numeric|exists:categories,id',
            'status' =>  'sometimes|numeric|in:0,1',
            'description'=>'sometimes|max:1000',
            'price'=>'sometimes|string',
            'image'=>'sometimes|image|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Name must be string!',
            'category_id.numeric' => 'category_id must be numeric!',
            'category_id.exists' => 'category_id must exist in categories table!',
            'status.numeric' => 'status must be numeric!',
            'status.in:0,1' => 'status must be in:0,1!',
            'description.max:1000' => 'description text max:1000!',
            'price.string' => 'price must be string!',
            'image.mimes' => 'image directory must be jpg or png or jpeg!',
            'image.image' => 'file must be an image!',
        ];
    }
}
