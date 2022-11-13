<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateOrderRequest extends FormRequest
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
