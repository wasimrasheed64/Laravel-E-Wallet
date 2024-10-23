<?php

namespace Wasimrasheed\EWallet\Validations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class WalletValidations
{

    /**
     * @throws ValidationException
     */
    public  function createWalletValidation($data): array
    {
        $validator = Validator::make($data, $this->createWalletValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }


    /**
     * @throws ValidationException
     */
    public function updateWalletValidation($data): array
    {
        $validator = Validator::make($data, $this->updateWalletValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
    public function createWalletValidationRules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',     // Must be a valid user ID that exists in the users table
            'phone_number' => 'required|string|size:11',         // You may adjust the size if your phone numbers differ in length
            'is_verified' => 'required|boolean',                 // Ensures it is either true or false
            'balance' => 'required|numeric|min:0',               // Must be a non-negative numeric value
            'balance_calculator' => 'required|numeric|min:0',    // Must be a non-negative numeric value
            'balance_hash' => 'required|string',                 // Must be a string value
            'status' => 'required|boolean',                      // Ensures it is either true or false
        ];
    }

    public static function updateWalletValidationRules(): array
    {
        return [
            'phone_number' => 'sometimes|string|size:11',         // You may adjust the size if your phone numbers differ in length
            'balance' => 'sometimes|numeric|min:0',               // Must be a non-negative numeric value
            'balance_calculator' => 'sometimes|numeric|min:0',    // Must be a non-negative numeric value
            'balance_hash' => 'required|string',                 // Must be a string value
        ];
    }
}