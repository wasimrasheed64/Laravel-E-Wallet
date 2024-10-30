<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Exception\WalletException;

trait WalletTrait
{

    /**
     * @param array $data
     * @return mixed
     * @throws WalletException
     */
    public function createWallet(array $data): mixed
    {
        return $this->walletController->store($data);
    }


    /**
     * @param int $id
     * @return array
     * @throws WalletException
     */
    public function getWallet(int $id): array
    {
        return $this->walletController->getById($id);
    }

    /**
     * @return Collection
     */
    public function getWallets(): Collection
    {
        return $this->walletController->getAll();
    }


    /**
     * @param int $id
     * @param array $data
     * @return string
     * @throws WalletException
     */
    public function updateWallet(int $id, array $data): string
    {
        $this->walletController->update($id, $data);
        return 'Wallet updated successfully';
    }


    /**
     * @param int $id
     * @return string
     * @throws WalletException
     */
    public function deleteWallet(int $id): string
    {
        $this->walletController->delete($id);
        return 'Wallet deleted successfully';
    }


    /**
     * @param $item
     * @param $column
     * @return array
     * @throws WalletException
     */
    public function getWalletByColumn($item, $column): array
    {
        return $this->walletController->getByColumn($item, $column);
    }

}