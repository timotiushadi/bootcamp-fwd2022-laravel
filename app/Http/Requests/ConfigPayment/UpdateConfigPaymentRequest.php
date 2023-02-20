<?php

namespace App\Http\Requests\ConfigPayment;

// use Gate;
use App\Models\MasterData\ConfigPayment;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule; // Only on update requests

class UpdateConfigPaymentRequest extends FormRequest
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
            'fee' =>[
                'required', 'string'
            ],
            'vat' =>[
                'required', 'string'
            ],
        ];
    }
}
