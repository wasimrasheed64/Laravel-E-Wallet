<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Http\Controllers\TransactionController;
use Wasimrasheed\EWallet\Validations\TransactionValidations;

/**
 *
 */
trait CreateTransactionTrait
{
    /**
     * @var TransactionController
     */
    protected TransactionController $transactionController;
    protected TransactionValidations $transactionValidations;

    /**
     * Constructor to inject the TransactionController.
     */
    public function initCreateTransactionTrait(TransactionController $transactionController, TransactionValidations $transactionValidations): void
    {
        $this->transactionController = $transactionController;
        $this->transactionValidations = $transactionValidations;
    }


    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function createTransaction(array $data): mixed
    {
        try{
            $validatedData = $this->transactionValidations->createTransactionValidation($data);
            return $this->transactionController->store($validatedData);
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getTransaction(int $id): array
    {
        try {
            return $this->transactionController->getById($id);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @return Collection
     * @throws Exception
     */
    public function getTransactions(): Collection
    {
        try {
            return $this->transactionController->getAll();
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
    public function updateTransaction(int $id, array $data): string
    {
        try{
            $validatedData = $this->transactionValidations->updateTransactionValidation($data);
            $this->transactionController->update($id, $validatedData);
            return 'Transaction updated successfully';
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function deleteTransaction(int $id): string
    {
        try {
            $this->transactionController->delete($id);
            return 'Transaction deleted successfully';
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
    public function getTransactionByColumn($item, $column): array
    {
        try {
            return $this->transactionController->getByColumn($item, $column);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

}