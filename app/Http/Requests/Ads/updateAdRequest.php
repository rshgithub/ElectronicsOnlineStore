<?php

namespace App\Http\Requests\Ads;

use Illuminate\Foundation\Http\FormRequest;

class updateAdRequest extends FormRequest
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

            'image'=>'required|image|mimes:jpg,png,jpeg'

        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'image is required!',
            'image.mimes' => 'image directory must be jpg or png or jpeg!',
            'image.image' => 'file must be an image!',
        ];
    }
}
