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
            'payment_method_id' => 'sometimes',
            'activity_id' => 'sometimes',
            'amount' => 'required|numeric|min:0',
            'cashflowIn' => 'required|boolean',
            'cashType' => 'required|string', // credit / debit
            'transaction_type' => 'required', // assuming these are the only valid values topUp,loyalty,purchase,purchaseReward,refunded
            'payment_method' => 'required|string|max:255', // card, jazz cash , easy pasia
            'external_transaction_id' => 'sometimes|string|max:255',
            'status' => 'required|boolean',
            'notes' => 'sometimes|string',
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
            'status' => 'sometimes|boolean',
            'notes' => 'sometimes|string',
        ];
    }
}