<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Http\Controllers\WalletController;
use Wasimrasheed\EWallet\Validations\WalletValidations;

/**
 *
 */
trait CreateWalletTrait
{

    /**
     * @var WalletController
     */
    protected WalletController $walletController;
    protected WalletValidations $walletValidations;

    /**
     * Constructor to inject the TransactionController.
     */
    public function initCreateWalletTrait(WalletController $walletController, WalletValidations $walletValidations): void
    {
        $this->walletController = $walletController;
        $this->walletValidations = $walletValidations;
    }


    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function createWallet(array $data): mixed
    {
        try{
            $validatedData = $this->walletValidations->createWalletValidation($data);
            return $this->walletController->store($validatedData);
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getWallet(int $id): array
    {
        try {
            return $this->walletController->getById($id);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @return Collection
     * @throws Exception
     */
    public function getWallets(): Collection
    {
        try {
            return $this->walletController->getAll();
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
    public function updateWallet(int $id, array $data): string
    {
        try{
            $validatedData = $this->walletValidations->updateWalletValidation($data);
            $this->walletController->update($id, $validatedData);
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
    public function deleteWallet(int $id): string
    {
        try {
            $this->walletController->delete($id);
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
    public function getWalletByColumn($item, $column): array
    {
        try {
            return $this->walletController->getByColumn($item, $column);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

}