<?php

namespace Wasimrasheed\EWallet\Validations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class WalletValidations
{

    /**
     * @throws ValidationException
     */
    public  function createValidation($data): array
    {
        $validator = Validator::make($data, $this->createValidationRules());
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
        $validator = Validator::make($data, $this->updateValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
    public function createValidationRules(): array
    {
        return [
            'user_id' => 'required|uuid|exists:users,uuid',     // Must be a valid user ID that exists in the users table
            'phone_number' => 'required|string|size:11',         // You may adjust the size if your phone numbers differ in length
            'is_verified' => 'required|boolean',                 // Ensures it is either true or false
            'balance' => 'required|numeric|min:0',               // Must be a non-negative numeric value
            'balance_calculator' => 'required|numeric|min:0',    // Must be a non-negative numeric value
            'balance_hash' => 'required|string',                 // Must be a string value
            'status' => 'required|boolean',                      // Ensures it is either true or false
        ];
    }

    public static function updateValidationRules(): array
    {
        return [
            'phone_number' => 'sometimes|string|size:11',         // You may adjust the size if your phone numbers differ in length
            'balance' => 'sometimes|numeric|min:0',               // Must be a non-negative numeric value
            'balance_calculator' => 'sometimes|numeric|min:0',    // Must be a non-negative numeric value
            'balance_hash' => 'required|string',                 // Must be a string value
        ];
    }
}