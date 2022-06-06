<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class newUserRequest extends FormRequest
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
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255|unique:users,email',
            'phone' =>  'required|string|between:10,14',

        ];
    }

    public function messages()
    {
        return [
            'name.string'=>'name must be string!',
            'name.max:25'=>'name max must be 25 characters!',
            'email.string'=>'email must be string!',
            'email.unique'=>'email must be unique!',
            'name.required' => 'name is required!',
            'phone.required' => 'phone is required!',
            'phone.string' => 'phone is string!',
            'phone.unique' => 'phone must be unique!',
            'phone.max:14' => 'phone_number maximum = 14!',
            'email.required' => 'email is required!',
            'email.email' => 'email must be valid email address!',
        ];
    }
}
