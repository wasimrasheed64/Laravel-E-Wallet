<?php

namespace Wasimrasheed\EWallet\Validations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TransactionValidations
{

    /**
     * @throws ValidationException
     */
    public  function createValidation($data): array
    {
        $validator = Validator::make($data, $this->createTransactionValidationRules());
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
        $validator = Validator::make($data, $this->updateTransactionValidationRules());
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
    public function createTransactionValidationRules(): array
    {
        return [
            'wallet_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required|numeric|min:0',
            'cashflowIn' => 'required|boolean',
            'cashType' => 'required|in:topUp,loyalty,purchase,purchaseReward,refunded', // assuming these are the only valid values
            'transaction_type' => 'required|in:easy_paisa,jazzcash,card', // assuming these are the valid transaction types
            'payment_method' => 'required|string|max:255',
            'external_transaction_id' => 'nullable|string|max:255',
            'activity' => 'nullable|uuid',
            'status' => 'required|boolean',
            'notes' => 'nullable|string',
        ];
    }

    public static function updateTransactionValidationRules(): array
    {
        return [
            'amount' => 'sometimes|numeric|min:0',
            'cashflowIn' => 'sometimes|boolean',
            'cashType' => 'sometimes',
            'transaction_type' => 'sometimes',
            'payment_method' => 'sometimes|string|max:255',
            'external_transaction_id' => 'sometimes|string|max:255',
            'activity' => 'sometimes|uuid',
            'status' => 'sometimes|boolean',
            'notes' => 'sometimes|string',
        ];
    }
}