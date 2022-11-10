<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => [
                'required', 'string',
            ],
            'preco' => [
                'required', 'string',
            ],
            'categoria_id' => [
                'required', 'string',
            ],
            'fornecedor_id' => [
                'required', 'string',
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin_access');
    }
}
