<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Exception\WalletException;
use Wasimrasheed\EWallet\Http\Controllers\PaymentMethodController;
use Wasimrasheed\EWallet\Http\Controllers\TransactionController;
use Wasimrasheed\EWallet\Http\Controllers\WalletController;
use Wasimrasheed\EWallet\Validations\PaymentMethodValidations;
use Wasimrasheed\EWallet\Validations\TransactionValidations;
use Wasimrasheed\EWallet\Validations\WalletValidations;


trait PaymentTrait
{

    /**
     * @param array $data
     * @return mixed
     * @throws WalletException
     */
    public function createPaymentMethod(array $data): mixed
    {
        return $this->paymentMethodController->store($data);
    }


    /**
     * @param int $id
     * @return array
     * @throws WalletException
     */
    public function getPaymentMethod(int $id): array
    {
        return $this->paymentMethodController->getById($id);
    }


    /**
     * @return Collection
     */
    public function getPaymentMethods(): Collection
    {
        return $this->paymentMethodController->getAll();
    }

    /**
     * @param int $id
     * @param array $data
     * @return string
     * @throws WalletException
     */
    public function updatePaymentMethod(int $id, array $data): string
    {
         $this->paymentMethodController->update($id, $data);
         return 'Wallet updated successfully';
    }


    /**
     * @param int $id
     * @return string
     * @throws WalletException
     */
    public function deletePaymentMethod(int $id): string
    {
         $this->paymentMethodController->delete($id);
         return 'Wallet deleted successfully';
    }

    /**
     * @param $item
     * @param $column
     * @return array
     * @throws WalletException
     */
    public function getWPaymentMethodByColumn($item, $column): array
    {
        return $this->paymentMethodController->getByColumn($item, $column);
    }

}