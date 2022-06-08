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
            'phone' =>  'required|string|min:10|max:14|unique:users,phone',
            'role' =>  'required|numeric|in:1,0',

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
            'phone.string' => 'phone must be string!',
            'phone.unique'=>'phone must be unique!',
            'phone.min:10'=>'phone min must be 10 numbers!',
            'phone.max:14'=>'phone max must be 14 numbers!',
            'email.required' => 'email is required!',
            'email.email' => 'email must be valid email address!',
            'role.required' => 'role is required!',
            'role.string' => 'role must be string!',
            'role.in:1,0' => 'phone must be 0 or 1 !',
            ];
    }
}
