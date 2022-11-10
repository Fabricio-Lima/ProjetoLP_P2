<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome'    => [
                'string',
                'required',
            ],
            'cpf'    => [
                'string',
                'required',
            ],
            'rg'    => [
                'string',
                'required',
            ],
            'telefone'    => [
                'string',
                'required',
            ],
            'celular'    => [
                'string',
                'required',
            ],
            'email'    => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin_access');
    }
}
