<?php

namespace Wasimrasheed\EWallet\Validations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PaymentMethodValidations
{

    /**
     * @throws ValidationException
     */
    public  function createValidation($data): array
    {
        $validator = Validator::make($data, $this->createPaymentMethodValidationRules());
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
        $validator = Validator::make($data, $this->updatePaymentMethodValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
    public function createPaymentMethodValidationRules(): array
    {
        return [
            'user_id' => 'required|uuid|exists:users,uuid',     // Must be a valid user ID that exists in the users table
            'wallet_id' => 'required|uuid|exists:wallets,uuid', // Ensures the wallet_id exists in the wallets table
            'last_four_digit' => 'required|string|size:4', // Exactly 4 digits for last four of card
            'expiry' => 'required|string|regex:/^(0[1-9]|1[0-2])\/?([0-9]{2})$/', // Validates MM/YY format
            'json' => 'sometimes|json',
            'status' => 'boolean',
            'encrypted_card' => 'required|string', // Encrypted card information
        ];
    }

    public static function updatePaymentMethodValidationRules(): array
    {
        return [
            'last_four_digit' => 'sometimes|string|size:4', // Exactly 4 digits for last four of card
            'expiry' => 'sometimes|string|regex:/^(0[1-9]|1[0-2])\/?([0-9]{2})$/', // Validates MM/YY format
            'json' => 'sometimes|json',
            'status' => 'boolean',
            'encrypted_card' => 'sometimes|string', // Encrypted card information
        ];
    }
}