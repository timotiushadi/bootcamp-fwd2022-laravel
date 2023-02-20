<?php

namespace App\Http\Requests\User;

// use Gate;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule; // Only on update requests

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Create middleware for kernel in here
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
            'name' =>[
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                // 'unique', -> change to code below
                Rule::unique('users')->ignore($this->user),
                'max:255'
            ],
            'password' => [
                'min:8',
                'string',
                'max:255',
                'mixedCase',
            ],
            // Add Validation for role this here
        ];
    }
}
