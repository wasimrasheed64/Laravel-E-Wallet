<?php

namespace Wasimrasheed\EWallet\Validations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ActivityValidations
{

    /**
     * @throws ValidationException
     */
    public  function createValidation($data): array
    {
        $validator = Validator::make($data, $this->createActivityValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }


    /**
     * @throws ValidationException
     */
    public function updateValidation($data): array
    {
        $validator = Validator::make($data, $this->updateActivityValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
    public function createActivityValidationRules(): array
    {
        return [
            'action' => 'required|string|max:500', // The action field is required, must be a string, and can have a maximum length of 255 characters.
            'points' => 'required|numeric|min:0', // The points field is required, must be numeric, and should be a positive value (min: 0).
        ];
    }

    public static function updateActivityValidationRules(): array
    {
        return [
            'action' => 'sometimes|string|max:500', // The action field is required, must be a string, and can have a maximum length of 255 characters.
            'points' => 'sometimes|numeric|min:0', // The points field is required, must be numeric, and should be a positive value (min: 0).
        ];
    }
}