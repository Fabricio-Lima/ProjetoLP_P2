<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => [
                'required', 'string',
            ],
            'preco' => [
                'required', 'numeric',
            ],
            'categoria_id' => [
                'required', 'numeric',
            ],
            'fornecedor_id' => [
                'required', 'numeric',
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin_access');
    }
}
