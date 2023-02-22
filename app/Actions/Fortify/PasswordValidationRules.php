<?php

namespace App\Actions\Fortify;

// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        return [
            'required', 
            'string', 
            'confirmed', 
            (new Password) 
            ->length(8)
            ->requireUppercase()
            ->requireNumeric()
        ];
    }
}
