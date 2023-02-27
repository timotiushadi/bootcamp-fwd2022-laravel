<?php

namespace App\Http\Requests\Doctor;

use Gate;
use App\Models\Operational\Doctor;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Abort if the requested doesn't have permission by user role
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'specialist_id' =>[
                'nullable', 'integer'
            ],
            'name' =>[
                'required',
                'string',
                'max:255'
            ],
            'fee' =>[
                'required',
                'string',
                'max:255'
            ],
            'photo' =>[
                'nullable',
                'string',
                'max:10000'
            ],
            // Add Validation for role this here
        ];
    }
}
