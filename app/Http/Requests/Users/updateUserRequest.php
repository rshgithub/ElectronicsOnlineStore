<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'name' => 'sometimes|string|max:25'.$this->user_id,
            'email' => 'sometimes|string|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255|unique:users,id',
            'phone' =>  'sometimes|string|min:10|max:14',
        ];
    }

    public function messages()
    {
        return [
            'name.string'=>'name must be string!',
            'email.string'=>'email must be string!',
            'email.unique'=>'email must be unique!',
            'phone.string'=>'phone must be string!',
            'phone.unique'=>'phone must be unique!',
            'phone.min:10'=>'phone min must be 10 numbers!',
            'phone.max:14'=>'phone max must be 14 numbers!',
            'email.email' => 'email must be valid email address!',
        ];
    }
}
