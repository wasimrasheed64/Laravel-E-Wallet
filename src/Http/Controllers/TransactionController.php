<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Models\Transaction;
use Wasimrasheed\EWallet\Validations\TransactionValidations;

/**
 * Class TransactionController
 *
 * This controller handles operations related to the `Transaction` model,
 * such as creating, updating, retrieving, and deleting transactions.
 * It extends the `BaseController` to leverage the shared CRUD functionality.
 */
class TransactionController extends BaseController
{
    /**
     * TransactionController constructor.
     *
     * Initializes the controller by passing the `Transaction` model and
     * the `TransactionValidations` validation class to the parent `BaseController`.
     *
     * @param Transaction $model The Transaction model instance used for database operations.
     * @param TransactionValidations $validations The validation logic specific to Transaction operations.
     */
    public function __construct(Transaction $model, TransactionValidations $validations)
    {
        // Call the parent constructor to initialize model and validation
        parent::__construct($model, $validations);
    }
}

