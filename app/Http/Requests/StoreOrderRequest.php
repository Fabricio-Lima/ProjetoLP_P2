<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'quantidade' => [
                'required', 'numeric',
            ],
            'pagamento' => [
                'required', 'string',
            ],
            'precoTotal' => [
                'required', 'numeric' . 100,
            ],
            'usuario_id' => [
                'required', 'numeric' . auth()->user()->id,
            ],
            'produto_id' => [
                'required', 'numeric',
            ]
        ];
    }

    public function authorize()
    {
        return Gate::allows('user_access');
    }
}
