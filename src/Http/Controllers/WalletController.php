<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Models\Wallet;
use Wasimrasheed\EWallet\Validations\WalletValidations;

/**
 * Class WalletController
 *
 * This controller handles all operations related to the `Wallet` model,
 * such as creating, updating, deleting, and retrieving wallets.
 * It extends the `BaseController` to inherit basic CRUD functionality.
 */
class WalletController extends BaseController
{
    /**
     * WalletController constructor.
     *
     * Initializes the controller by passing the `Wallet` model and
     * the `WalletValidations` validation class to the parent `BaseController`.
     *
     * @param Wallet $model The Wallet model instance for performing database operations.
     * @param WalletValidations $validations The validation logic specific to Wallet operations.
     */
    public function __construct(Wallet $model, WalletValidations $validations)
    {
        // Call the parent constructor to initialize model and validation
        parent::__construct($model, $validations);
    }
}
