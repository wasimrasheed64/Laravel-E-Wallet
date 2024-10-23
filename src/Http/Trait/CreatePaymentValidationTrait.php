<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Http\Controllers\PaymentMethodController;
use Wasimrasheed\EWallet\Http\Controllers\TransactionController;
use Wasimrasheed\EWallet\Http\Controllers\WalletController;
use Wasimrasheed\EWallet\Validations\PaymentMethodValidations;
use Wasimrasheed\EWallet\Validations\TransactionValidations;
use Wasimrasheed\EWallet\Validations\WalletValidations;

/**
 *
 */
trait CreatePaymentValidationTrait
{

    /**
     * @var PaymentMethodController
     */
    protected PaymentMethodController $paymentMethodController;
    protected PaymentMethodValidations $paymentMethodValidations;

    /**
     * Constructor to inject the TransactionController.
     */
    public function initCreatePaymentValidationTrait(PaymentMethodController $paymentMethodController, PaymentMethodValidations $paymentMethodValidations): void
    {
        $this->paymentMethodController = $paymentMethodController;
        $this->paymentMethodValidations = $paymentMethodValidations;
    }


    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function createPaymentMethod(array $data): mixed
    {
        try{
            $validatedData = $this->paymentMethodValidations->createPaymentMethodValidation($data);
            return $this->paymentMethodController->store($validatedData);
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getPaymentMethod(int $id): array
    {
        try {
            return $this->paymentMethodController->getById($id);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @return Collection
     * @throws Exception
     */
    public function getPaymentMethods(): Collection
    {
        try {
            return $this->paymentMethodController->getAll();
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function updatePaymentMethod(int $id, array $data): string
    {
        try{
            $validatedData = $this->paymentMethodValidations->updatePaymentMethodValidation($data);
            $this->paymentMethodController->update($id, $validatedData);
            return 'Wallet updated successfully';
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function deletePaymentMethod(int $id): string
    {
        try {
            $this->paymentMethodController->delete($id);
            return 'Wallet deleted successfully';
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @param $item
     * @param $column
     * @return array
     * @throws Exception
     */
    public function getWPaymentMethodByColumn($item, $column): array
    {
        try {
            return $this->paymentMethodController->getByColumn($item, $column);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

}