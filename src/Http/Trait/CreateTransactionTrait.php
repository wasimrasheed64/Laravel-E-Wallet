<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Exception\WalletException;


trait CreateTransactionTrait
{

    /**
     * @param array $data
     * @return mixed
     * @throws WalletException
     */
    public function createTransaction(array $data): mixed
    {
        return $this->transactionController->store($data);
    }


    /**
     * @param int $id
     * @return array
     * @throws WalletException
     */
    public function getTransaction(int $id): array
    {
        return $this->transactionController->getById($id);
    }


    /**
     * @return Collection
     */
    public function getTransactions(): Collection
    {
        return $this->transactionController->getAll();
    }

    /**
     * @param int $id
     * @param array $data
     * @return string
     * @throws WalletException
     */
    public function updateTransaction(int $id, array $data): string
    {
        $this->transactionController->update($id, $data);
        return 'Transaction updated successfully';
    }


    /**
     * @param int $id
     * @return string
     * @throws WalletException
     */
    public function deleteTransaction(int $id): string
    {

        $this->transactionController->delete($id);
        return 'Transaction deleted successfully';
    }

    /**
     * @param $item
     * @param $column
     * @return array
     * @throws WalletException
     */
    public function getTransactionByColumn($item, $column): array
    {
        return $this->transactionController->getByColumn($item, $column);
    }

}