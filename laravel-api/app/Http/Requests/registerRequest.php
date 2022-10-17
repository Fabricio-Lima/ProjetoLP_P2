<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
        * @return bool
    */
    public function authorize()
    {
        return true;
    }

    /**
        * @return array
    */
    public function rules()
    {
        return [
            'email' =>                  'required|email:rfc,dns|unique:users,email',
            'username' =>               'required|unique:users,username',
            'password' =>               'required|min:8',
            'password_confirmation' =>  'required|same:password'
        ];
    }
}
