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
                'required', 'number',
            ],
            'categoria_id' => [
                'required', 'number',
            ],
            'fornecedor_id' => [
                'required', 'number',
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin_access');
    }
}
